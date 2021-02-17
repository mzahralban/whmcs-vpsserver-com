<?php

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;


$hookManager->register(
        function ($args)
{
    if ($args['filename'] == "configproducts" && $_GET['action'] == "edit")
    {

        $product = ModulesGarden\Servers\VpsServer\Core\Models\Whmcs\Product::where('id', $_GET['id'])->first();

        if ($product->servertype == "VpsServer" && $_REQUEST['ajax'] == 1 && isset($_REQUEST['loadData']) && isset($_REQUEST['namespace']))
        {
            \ModulesGarden\Servers\VpsServer\Core\Helper\sl('adminProductPage')->execute();
            die();
        }
    }

    if ($args['filename'] == "clientsservices"){
        $params = Params::moduleParams($_SESSION['serviceid']);
        $api = new Api($params);
        $serverId = CustomFields::get($params['serviceid'], 'serverID');
        if(empty($serverId)){
          return;
        }
        if(isset($_REQUEST['timePeriod'])){
          switch($_REQUEST['timePeriod'])
          {
            case 'day':
              $data = $api->getServerStatisticsPerHour(CustomFields::get($params['serviceid'], 'serverID'));
              $data = array_reverse(array_slice($data, 0, 25));
            break;
    
            case 'week':
              $data = $api->getServerStatisticsPerHour(CustomFields::get($params['serviceid'], 'serverID'));
              $data = array_reverse(array_slice($data, 0, 168));
            break;
    
            case 'month':
              $data = $api->getServerStatisticsPerDay(CustomFields::get($params['serviceid'], 'serverID'));
              $data = array_reverse(array_slice($data, 0, 31));
            break;
    
            default:
    
              $data = $api->getServerStatisticsPerHour(CustomFields::get($params['serviceid'], 'serverID'));
              $data = array_reverse(array_slice($data, 0, 25));
          }
          
          foreach($data as $key => $single)
          {
              if($_REQUEST['timePeriod'] == 'week')
              {
                  if($key %6 != 0)
                  {
                    continue;
                  } 
              }
              switch($_REQUEST['timePeriod'])
              {
                case 'day':
                  $time = date('H:i', strtotime($single->statistic_time));
                break;
        
                case 'week':
                  $time = date('m-d H:i', strtotime($single->statistic_time));
                break;
        
                case 'month':
                  $time = date('m-d', strtotime($single->statistic_time));
                break;
        
                default:
                  $time = date('H:i', strtotime($single->statistic_time));
              }
              
              $labels[] = $time;
              $bandwidthInData[] = Params::parseGB($single->bandwidth_received);
              $bandwidthOutData[] = Params::parseGB($single->bandwidth_sent);
              $cpuData[] = $single->cpu;
              $averageioWriteData[] = $single->io_writes;
              $averageioReadData[] = $single->io_reads;
              $averagediskWriteData[] = Params::parseGB($single->io_data_written);
              $averagediskReadData[] = Params::parseGB($single->io_data_read);
          }
          ob_clean();
          echo json_encode([
            'data' => [
              'labels' => array_values($labels),
              'bandwidthInData' => array_values($bandwidthInData),
              'bandwidthOutData' => array_values($bandwidthOutData),
              'cpuData' => array_values($cpuData),
              'averageioWriteData' => array_values($averageioWriteData),
              'averageioReadData' => array_values($averageioReadData),
              'averagediskWriteData' => array_values($averagediskWriteData),
              'averagediskReadData' => array_values($averagediskReadData)
            ]
          ]);
          die;
    
        } else {
          
          $data = $api->getServerStatisticsPerHour(CustomFields::get($params['serviceid'], 'serverID'));
          $data = array_reverse(array_slice($data, 0, 25));
          foreach($data as $single)
          {
              $time = date('H:i', strtotime($single->statistic_time));
              $labels[] = $time;
              $bandwidthInData[] = Params::parseGB($single->bandwidth_received);
              $bandwidthOutData[] = Params::parseGB($single->bandwidth_sent);
              $cpuData[] = $single->cpu;
              $averageioWriteData[] = $single->io_writes;
              $averageioReadData[] = $single->io_reads;
              $averagediskWriteData[] = Params::parseGB($single->io_data_written);
              $averagediskReadData[] = Params::parseGB($single->io_data_read);
          }
      
          $labels = json_encode(array_values($labels));
          $bandwidthInData = json_encode(array_values($bandwidthInData));
          $bandwidthOutData = json_encode(array_values($bandwidthOutData));
          $cpuData = json_encode(array_values($cpuData));
          $averageioWriteData = json_encode(array_values($averageioWriteData));
          $averageioReadData = json_encode(array_values($averageioReadData));
          $averagediskWriteData = json_encode(array_values($averagediskWriteData));
          $averagediskReadData = json_encode(array_values($averagediskReadData));
        }
    
            return <<<SCRIPT
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
            <style>
                canvas
                {
                    height: 550px  !important;
                    width: 1100px !important;
                }
            </style>
            <script>
            $(document).ready(function(){
              if($('#unavailableServer').length > 0){
                return;
              }
              $('.lu-mg-wrapper').after('\
                <label>Period</label>\
                <select class="form-control" id="timePeriod" style="margin-bottom:20px; width:1100px;">\
                    <option value="day">Last 24 hours</option>\
                    <option value="week">Last week</option>\
                    <option value="month">Last month</option>\
                </select>\
                <div style="background-color:white"><canvas style="margin-bottom:30px" id="bandwidth" style="width:700px; height:450px;"></canvas></div>\
                <div style="background-color:white"><canvas style="margin-bottom:30px" id="cpu" style="width:700px; height:450px;"></canvas></div>\
                <div style="background-color:white"><canvas style="margin-bottom:30px" id="averageio" style="width:700px; height:450px;"></canvas></div>\
                <div style="background-color:white"><canvas style="margin-bottom:30px" id="averagedisk" style="width:700px; height:450px;"></canvas></div>');
    
              $(document).on('change', '#timePeriod', function(){
                $('#bandwidth').css('opacity', '0.4');
                $('#cpu').css('opacity', '0.4');
                $('#averageio').css('opacity', '0.4');
                $('#averagedisk').css('opacity', '0.4');
                $.ajax({
                  method: "POST",
                  dataType: "json",
                  data:{
                      timePeriod : $('#timePeriod').val()
                  }
              }).done(function(response) {
    
                bandwidth.data.datasets[0].data = response.data.bandwidthInData;
                bandwidth.data.datasets[1].data = response.data.bandwidthOutData;
                cpu.data.datasets[0].data = response.data.cpuData;
                averageio.data.datasets[0].data = response.data.averageioWriteData;
                averageio.data.datasets[1].data = response.data.averageioReadData;
                averagedisk.data.datasets[0].data = response.data.averagediskWriteData;
                averagedisk.data.datasets[1].data = response.data.averagediskReadData;
                bandwidth.data.labels = response.data.labels;
                cpu.data.labels = response.data.labels;
                averageio.data.labels = response.data.labels;
                averagedisk.data.labels = response.data.labels;
                /*
                 * UPDATE GRAPHS DATA
                 */
                bandwidth.update();
                cpu.update();
                averageio.update();
                averagedisk.update();
                $('#bandwidth').css('opacity', '1');
                $('#cpu').css('opacity', '1');
                $('#averageio').css('opacity', '1');
                $('#averagedisk').css('opacity', '1');
                });
              });
    
              var bandwidth = new Chart(document.getElementById("bandwidth"), {
                    type: 'line',
                    data: {
                      labels: {$labels},
                      datasets: [{ 
                            data: {$bandwidthInData},
                            label: "Inbound",
                            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                            borderColor: ['rgba(255, 99, 132, 1)'],
                            fill: true
                        }, { 
                            data: {$bandwidthOutData},
                            label: "Outbound",
                            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                            borderColor: ['rgba(54, 162, 235, 1)'],
                            fill: true
                        }
                      ]
                    },
                    options: {
                      title: {
                        display: true,
                        text: 'Bandwidth [GB]'
                      },
                    scales: {
                            xAxes: [{
                            ticks: {
                                autoskip: true,
                            }
                    }]
                    },
                    }
                });
    
                var cpu = new Chart(document.getElementById("cpu"), {
                    type: 'line',
                    data: {
                    labels: {$labels},
                      datasets: [{ 
                            data: {$cpuData},
                            label: "CPU",
                            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                            borderColor: ['rgba(255, 99, 132, 1)'],
                            fill: true
                        }
                      ]
                    },
                    options: {
                      title: {
                        display: true,
                        text: 'CPU [%]'
                      }
                    }
                });
    
                var averageio = new Chart(document.getElementById("averageio"), {
                    type: 'line',
                    data: {
                        labels: {$labels},
                        datasets: [{ 
                              data: {$averageioWriteData},
                              label: "IO write actions",
                              backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                              borderColor: ['rgba(255, 99, 132, 1)'],
                              fill: true
                          }, { 
                              data: {$averageioReadData},
                              label: "IO read actions",
                              backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                              borderColor: ['rgba(54, 162, 235, 1)'],
                              fill: true
                          }
                        ]
                      },
                    options: {
                      title: {
                        display: true,
                        text: 'Average IO per second [p/s]'
                      }
                    }
                });
    
                var averagedisk = new Chart(document.getElementById("averagedisk"), {
                    type: 'line',
                    data: {
                        labels: {$labels},
                        datasets: [{ 
                              data: {$averagediskWriteData},
                              label: "IO written",
                              backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                              borderColor: ['rgba(255, 99, 132, 1)'],
                              fill: true
                          }, { 
                              data: {$averagediskReadData},
                              label: "IO read",
                              backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                              borderColor: ['rgba(54, 162, 235, 1)'],
                              fill: true
                          }
                        ]
                      },
                    options: {
                      title: {
                        display: true,
                        text: 'Average disk data [GB]'
                      }
                    }
                });
            })
            </script>
SCRIPT;
    }
}, 1001
);
