<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Pages;

use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Buttons\ChangeHostnameButton;

class ChangeHostnamePage extends BaseContainer implements ClientArea
{


    protected $id    = 'changeHostnameTable';
    protected $name  = 'changeHostnameTable';
    protected $title = 'changeHostnameTable';

    public function loadHtml()
    {

    }

    public function initContent()
    {
        $MGLANG = Lang::getInstance();
        $service = \WHMCS\Service\Service::find($_REQUEST['id']);
        $extraVariables['hostname'] = $service->domain;
        $extraVariables['id'] = $service->id;
        $extraVariables['MGLANG'] = $MGLANG;
        if (isset($_REQUEST['successChange'])) {
            $extraVariables['successChange'] = true;
        }
        if(isset($_REQUEST['changedHostname']))
        {

            try{
                $params = Params::moduleParams($_REQUEST['id']);
                $serverId = CustomFields::get($params['serviceid'], 'serverID');
                $api = new Api($params);
                $result = $api->serverChangeHostname($serverId, $_REQUEST['changedHostname']);
                $changed = true;
                if($result->result !== true)
                {
                    $changed = false;
                }

                $details = $api->getServerDetails($serverId);
                $hostname = $details->hostname;
                if($hostname != $_REQUEST['changedHostname'])
                {
                    throw new \Exception();
                }
                \WHMCS\Service\Service::where('id', $_REQUEST['id'])->update(['domain' => $hostname]);

            } catch(\Exception $e)
            {
                $changed = false;
            }
            ob_clean();
            echo json_encode([
                'response' => [
                    'id' => $_REQUEST['id'],
                    'result' => $changed,
                    'message' => $MGLANG->T('changedError')
                ]
            ]);
            die;
        }
        if (isset($_REQUEST['hostname'])) {
            $allowedHostname = preg_match('/^[a-zA-Z0-9.+_-]+$/', $_REQUEST['hostname']);
            if($allowedHostname == 0)
            {
                $msg = $MGLANG->T('saveHostnameIncorrect');
            }
            if(empty($_REQUEST['hostname']))
            {
                $allowedHostname = false;
                $msg = $MGLANG->T('saveHostnameEmpty');
            }
            ob_clean();
            echo json_encode([
                'response' => [
                    'result' => (bool)$allowedHostname,
                    'message' => $msg
                ]
            ]);
            die;
        }
        $this->customTplVars = $extraVariables;
    }

    protected function loadData()
    {
        
    }

}
