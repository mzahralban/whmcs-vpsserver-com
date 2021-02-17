<?php

namespace ModulesGarden\Servers\VpsServer\App\Http\Admin\Server;

use Exception;
use ModulesGarden\Servers\VpsServer\Core\Helper;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\Http\AbstractHooksClient;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Pages\ServerInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Pages\EmptyServerInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Product\Pages\BuildingServerInformation;

class ProductPage extends AbstractHooksClient {

    public function index() {
        return Helper\view()
                        ->addElement(\ModulesGarden\Servers\VpsServer\App\UI\Configuration\Pages\Form::class)
                        ->addElement(\ModulesGarden\Servers\VpsServer\App\UI\Configuration\Pages\ConfigurableOptions::class);
    }

    public function adminServicesTabFields() {
        try {

            $params = Params::moduleParams($_SESSION['serviceid']);
            if($params['status'] == 'Terminated' || $params['status'] == 'Pending')
            {
                return;
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

            if(empty($customField))
            {
                return Helper\view()->addElement(EmptyServerInformation::class);
            }

            return Helper\view()
  
                            ->addElement(ServerInformation::class);
        }
        catch (Exception $ex) {
        }
    }

}
