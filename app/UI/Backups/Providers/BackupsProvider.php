<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Providers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class BackupsProvider extends BaseDataProvider implements ClientArea, AdminArea
{
    public function read()
    {
        $this->data['id'] = $this->actionElementId;
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
            $params = Params::moduleParams($this->getRequestValue('id'));
            $api = new Api($params);
            $result = $api->backupRestore(CustomFields::get($params['serviceid'], 'serverID'), $this->formData['id']);

            
            if($result->result == true)
            {
                return (new HtmlDataJsonResponse())
                    ->setStatusSuccess()
                    ->setMessageAndTranslate('restoreBackup')
                    ->setData(['createButton' => true])
                    ->setCallBackFunction('hrToggleCreateButton');
            } else {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorBackupIsRestoring');
            }
        }
        catch (\Exception $ex)
        {
            return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorBackupIsRestoring');
        }
    }
}