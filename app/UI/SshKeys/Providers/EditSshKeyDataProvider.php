<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Providers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class EditSshKeyDataProvider extends BaseDataProvider implements ClientArea, AdminArea
{

    public function read()
    {
        $this->data['id'] = $this->actionElementId;
        $params = Params::moduleParams($this->getRequestValue('id'));
        $api = new Api($params);
        $keys = $api->listServerSshKeys(CustomFields::get($params['serviceid'], 'serverID'));
        $data = [];

        foreach ($keys as &$key){
            if($key->id == $this->actionElementId)
            {
                $this->data['label'] = $key->label;
                $this->data['ssh_key'] = $key->key;
                $this->id = $key->id;
            }
        }
    }

    public function create()
    {
        
    }

    public  function update()
    {
        try{
            $params = Params::moduleParams($this->getRequestValue('id'));
            $api = new Api($params);
            $content = [
                'label' => $this->formData['label'],
                'ssh_key' => $this->formData['ssh_key']
            ];
            $result = $api->sshKeyUpdate($this->formData['id'], $content);
            if($result->modified != true)
            {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorSshKeyEdit');
            }
            return (new HtmlDataJsonResponse())->setStatusSuccess()->setMessageAndTranslate('successSshKeyEdit');
        } catch(\Exception $e)
        {
            return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorSshKeyEdit');
        }
    }

    public function delete()
    {

    }
}
