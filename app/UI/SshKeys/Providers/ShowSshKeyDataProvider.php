<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Providers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class ShowSshKeyDataProvider extends BaseDataProvider implements ClientArea, AdminArea
{

    public function read()
    {
        $this->data['id'] = $this->actionElementId;
        $params = Params::moduleParams($this->getRequestValue('id'));
        $api = new Api($params);
        $keys = $api->listServerSshKeys(CustomFields::get($params['serviceid'], 'serverID'));

        foreach ($keys as &$key){
            if($key->id == $this->actionElementId)
            {
                $this->data['ssh_key'] = $key->key;
            }
        }
    }

    public function create()
    {
        
    }

    public  function update()
    {
        
    }

    public function delete()
    {

    }
}
