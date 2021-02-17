<?php

namespace ModulesGarden\Servers\VpsServer\App\Helpers;

use Exception;
use ModulesGarden\Servers\VpsServer\App\Models\MailBoxRead;
use ModulesGarden\Servers\VpsServer\App\Models\ProductConfiguration;
use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use function ModulesGarden\Servers\VpsServer\Core\Helper\sl;

class ConfigOptions
{

    private function createCustomFields()
    {
        CustomFields::create($_REQUEST['id'], 'serverID|Server ID');
     }


    private function createTable()
    {
        $productConfig = new ProductConfiguration();
        $productConfig->createOrUpdateTable();
    }

    private function checkServer()
    {
        if (empty($_REQUEST['servergroup']))
        {
            throw new Exception(Lang::getInstance()->T('emptyServerGroup'));
        }
    }

    public function getConfig()
    {
        $this->checkServer();
        $this->createTable();
        $this->createCustomFields();

        $content = sl('adminProductPage')->execute();

        if(empty($content))
        {
            throw new Exception(Lang::getInstance()->T('connectionProblem'));
        }
        echo json_encode(['content' => "<tr><td>" . $content . "</td></tr>", 'mode' => 'advanced']);
        die();
    }

    public function getJsCode()
    {
        $dataQuery = http_build_query($_REQUEST);

        return "
                <script>
                    $('#layers').remove();
                    $('.lu-alert').remove();
                    $('#tblModuleSettings').addClass('hidden');
                    $('#tblMetricSettings').before('<img style=\"margin-left: 50%; margin-top: 15px; margin-bottom: 15px; height: 20px\" id=\"mg-configoptionLoader\" src=\"images/loading.gif\">');
                    $.post({
                        url: '{$_SERVER['HTTP_ORIGIN']}{$_SERVER['PHP_SELF']}?$dataQuery&magic=1'
                    })
                    .done(function( data ){
                        $('#mg-configoptionLoader').remove();
                        if ({$_REQUEST['servergroup']} == 0)
                        {
                            var error = JSON.parse(data);
                            $('#serverReturnedError').removeClass('hidden');
                            $('#serverReturnedErrorText').text(error.content);
                        }
                        else
                        {
                            var json = JSON.parse(data);
                            $('#tblModuleSettings').html(json.content).removeClass('hidden');
                        }
//                        
                    });
                </script>";

    }
}
