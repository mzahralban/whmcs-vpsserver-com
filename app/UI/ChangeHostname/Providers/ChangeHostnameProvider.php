<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Providers;

use ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Helpers\ChangeHostnameManager;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;
use function ModulesGarden\Servers\VpsServer\Core\Helper\sl;

class ChangeHostnameProvider extends BaseDataProvider implements ClientArea, AdminArea
{

    public function read()
    {
        if(!$this->actionElementId){
            return;
        }
        $this->data['id'] = $this->actionElementId;
        $manager = new ChangeHostnameManager($this->whmcsParams);
        $entity = $manager->read($this->data['id']);
        $this->data['description'] =  $entity->description;
    }

    public function create()
    {
        
    }

    public function delete()
    {

    }

    public function deleteMass()
    {

    }

    public  function update()
    {

    }

    public function restore()
    {
        try
        {
            $manager = new ChangeHostnameManager($this->whmcsParams);
            $entity = $manager->read($this->formData['id']);
            if($entity->status !=='Available')
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorChangeHostname');
            $manager->restore($this->formData['id']);
            sl("lang")->addReplacementConstant("description", $this->formData['description']);
            return (new HtmlDataJsonResponse())
                ->setStatusSuccess()
                ->setMessageAndTranslate('restoreBackup')
                ->setData(['createButton' => true])
                ->setCallBackFunction('hrToggleCreateButton');
        }
        catch (\Exception $ex)
        {
            $msg = $ex->getMessage();
            if(preg_match('/Locked/',$msg))
            {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorChangeHostname');
            }
            return (new HtmlDataJsonResponse())->setStatusError()->setMessage($msg);
        }
    }



}
