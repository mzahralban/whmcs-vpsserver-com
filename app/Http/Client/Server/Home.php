<?php

namespace ModulesGarden\Servers\VpsServer\App\Http\Client\Server;

use ModulesGarden\Servers\VpsServer\Core\Helper;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\Http\AbstractController;
use ModulesGarden\Servers\VpsServer\App\UI\Home\Pages\ControlPanel;
use ModulesGarden\Servers\VpsServer\App\UI\Home\Pages\ManageService;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Pages\BuildingServerInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Pages\ServerInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Pages\EmptyServerInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Pages\PendingServerInformation;

class Home extends AbstractController
{

    public function index()
    {
        $params = Params::moduleParams($_REQUEST['id']);

        if($params['status'] == 'Terminated' || $params['status'] == 'Pending')
        {
            return 's';
        }
        $customField = CustomFields::get($params['serviceid'], 'serverID');
        if(empty($customField))
        {
            return Helper\view()->addElement(EmptyServerInformation::class);
        }

        $api = new Api($params);
        $details = $api->getServerDetails($customField);

        if($details->state == 'Task Pending')
        {
            return Helper\view()->addElement(PendingServerInformation::class);
        }

        if($details->state == 'Building')
        {
            return Helper\view()->addElement(BuildingServerInformation::class);
        }

        if(!$details->id)
        
        {
            return Helper\view()->addElement(EmptyServerInformation::class);
        }
     
        return Helper\view()->addElement(ControlPanel::class)
                        ->addElement(ManageService::class)
                        ->addElement(ServerInformation::class);
    }

}
