<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Providers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Helpers\SshKeysManager;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class AddSshKeyDataProvider extends BaseDataProvider implements ClientArea, AdminArea
{

    public function read()
    {
        
    }

    public function create()
    {
        try{
            $params = Params::moduleParams($this->getRequestValue('id'));
            $api = new Api($params);
            $content = [
                'label' => $this->formData['label'],
                'ssh_key' => $this->formData['ssh_key']
            ];
            $result = $api->createSshKey(CustomFields::get($params['serviceid'], 'serverID'), $content);
            $result2 = $api->applySshKey(CustomFields::get($params['serviceid'], 'serverID'), []);
            if($result2->result !== true || empty($result->id))
            {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorSshKeyAdd');
            }
            return (new HtmlDataJsonResponse())->setStatusSuccess()->setMessageAndTranslate('successSshKeyAdd');
        } catch(\Exception $e)
        {
            return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorSshKeyAdd');
        }
    }

    public  function update()
    {

    }

    public function delete()
    {

    }
}
