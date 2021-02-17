<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Providers;

use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Helpers\FirewallsManager;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class FirewallsProvider extends BaseDataProvider implements ClientArea, AdminArea
{

    public function read()
    {
        if(!$this->actionElementId){
            return;
        }
        $this->data['id'] = $this->actionElementId;
        $manager = new FirewallsManager($this->whmcsParams);
        $entity = $manager->read($this->data['id']);
        $this->data['description'] =  $entity->description;
    }

    public function create()
    {
        try{
            $params = Params::moduleParams($this->getRequestValue('id'));
            $content = [
                'command' => $this->formData['command'],
                'address' => $this->formData['address'],
                'protocol' => $this->formData['protocol'],
                'port' => $this->formData['port'],
                'network_interface_id' => $this->formData['network_interface_id']
            ];
    
            $api = new Api($params);
            $result = $api->createFirewallRule(CustomFields::get($params['serviceid'], 'serverID'),$content);
            if(!$result)
            {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorCreateFirewall');
            }
            return (new HtmlDataJsonResponse())->setStatusSuccess()->setMessageAndTranslate('successCreateFirewall');

        } catch(\Exception $e)
        {
            return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorCreateFirewall');
        }

    }

    public function delete()
    {
        try{
            $params = Params::moduleParams($this->getRequestValue('id'));
            $api = new Api($params);
    
            $result = $api->firewallDelete(CustomFields::get($params['serviceid'], 'serverID'),$this->formData['id']);
            if(!$result)
            {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorFirewallIsDeleting');
            }
            return (new HtmlDataJsonResponse())->setStatusSuccess()->setMessageAndTranslate('successDeleteFirewall');
        } catch(\Exception $e)
        {
            return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorFirewallIsDeleting');
        }

    }

    public function deleteMass()
    {

    }

    public  function update()
    {

    }
}
