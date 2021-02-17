<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Providers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class AddBackupScheduleDataProvider extends BaseDataProvider implements ClientArea, AdminArea
{

    public function read()
    {
        
    }

    public function create()
    {
        try{
            $params = Params::moduleParams($this->getRequestValue('id'));
            $api = new Api($params);
            $date = $this->formData['year'].'-'.$this->formData['month'].'-'.$this->formData['days'].' '.$this->formData['hour'].':'.$this->formData['minutes'];
            $content = [
                'disk_id' => $this->formData['disks'],
                "period" => $this->formData['period'],
                "start_time" => $date,
                "rotation_period" => $this->formData['rotation_period'],
                "duration" => $this->formData['duration']
            ];
            $result = $api->createBackupSchedule(CustomFields::get($params['serviceid'], 'serverID'), $content);
            if($result->result !== true)
            {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorBackupScheduleAdd');
            }
            return (new HtmlDataJsonResponse())->setStatusSuccess()->setMessageAndTranslate('successBackupSchedulAdd');
        } catch(\Exception $e)
        {
            return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorBackupSchedulAdd');
        }
    }

    public  function update()
    {

    }

    public function delete()
    {

    }
}
