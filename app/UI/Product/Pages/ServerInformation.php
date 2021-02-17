<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Product\Pages;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Others\Label;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Helpers\Server;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\Column;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataTable;
use ModulesGarden\Servers\VpsServer\Core\UI\Traits\RequestObjectHandler;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Helpers\ServerManager;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Buttons\ChangeHostname;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Elements\PasswordElement;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Providers\ExtendArrayDataProvider;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataProviders\Providers\ArrayDataProvider;

class ServerInformation extends DataTable implements ClientArea, AdminArea
{
    use RequestObjectHandler;

    protected $id          = 'serverinformationTable';
    protected $title       = 'serverinformationTable';
    protected $searchable  = false;
    protected $tableLength = "100";

    protected function loadHtml()
    {
        $this->addColumn((new Column('name')))->addColumn((new Column('value')));
    }

    public function replaceFieldValue($key, $row)
    {
        if($row['noLangName'] == "status")
        {
            $label = (new Label('status'))
                ->addClass('lu-label--status')
                ->setTitle($row[$key])
                ->setBackgroundColor('')
                ->addHtmlAttribute('data-function', 'checkServerStatus')
                ->setColor('');

            switch(strtolower($row[$key]))
            {
                case 'online':
                    return $label->addClass('lu-label--success')->getHtml();
                case 'offline':
                    return $label->addClass('lu-label--danger')->getHtml();
                default:
                    return $label->addClass('lu-label--warning')->getHtml();
            }
        }

        if($row['noLangName'] == "password")
        {
            return (new PasswordElement())->setValue($row[$key])->getHtml();
        }

        return $row[$key];
    }

    protected function loadData()
    {

        $dataProvider = new ArrayDataProvider();
        $data         = new ServerManager($this->whmcsParams);
        $dataProvider->setData($data->getInformation());
        $this->setDataProvider($dataProvider);
    }

    public function initContent()
    {
        $this->loadRequestObj();

        if($this->requestObj->query->get('mgFormAction') == "checkServerStatus"){

            if(count($this->whmcsParams) == 0)
            {
                if(!isset($_REQUEST['id'])){
                    $serviceId = $_SESSION['serviceid'];
                } else {
                    $serviceId = $_REQUEST['id'];
                }
                $this->whmcsParams = Params::moduleParams($serviceId);
            }
            $api = new Api($this->whmcsParams);
            $serverId = CustomFields::get($this->whmcsParams['serviceid'], 'serverID');
            $details = $api->getServerDetails($serverId);

            switch(strtolower($details->state))
            {
                case 'online':
                    $data = ['status' => 'Online', 'labelClass'=> 'lu-label lu-tooltip lu-label--status lu-label--success'];
                    break;
                case 'offline':
                    $data = ['status' => 'Offline', 'labelClass'=> 'lu-label lu-tooltip lu-label--status lu-label--danger'];
                    break;
                default:
                    $data = ['status' => $details->state, 'labelClass'=> 'lu-label lu-tooltip lu-label--status lu-label--warning'];
                    break;
            }

            $this->cleanOutputBuffer();
            echo json_encode($data);
            die();
        }


    }

    protected function cleanOutputBuffer()
    {
        $outputBuffering = ob_get_contents();
        if($outputBuffering !== FALSE)
        {
            if(!empty($outputBuffering))
            {
                ob_clean();
            }
            else
            {
                ob_start();
            }
        }

        return $this;
    }

    public function getTableLength()
    {
        return $this->tableLength;
    }

}
