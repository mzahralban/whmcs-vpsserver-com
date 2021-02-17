<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Providers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class AddBackupDataProvider extends BaseDataProvider implements ClientArea, AdminArea
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
                'disk_id' => $this->formData['disks']
            ];
            $result = $api->createBackup(CustomFields::get($params['serviceid'], 'serverID'), $content);
            if($result->result !== true)
            {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorBackupAdd');
            }
            return (new HtmlDataJsonResponse())->setStatusSuccess()->setMessageAndTranslate('successBackupAdd');
        } catch(\Exception $e)
        {
            return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorBackupAdd');
        }
    }

    public  function update()
    {

    }

    public function delete()
    {

    }
}
