<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Providers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class EditBackupScheduleDataProvider extends BaseDataProvider implements ClientArea, AdminArea
{

    public function read()
    {
        $this->data['id'] = $this->actionElementId;
        $params = Params::moduleParams($this->getRequestValue('id'));
        $api = new Api($params);
        $keys = $api->listBackupsSchedules(CustomFields::get($params['serviceid'], 'serverID'));

        foreach ($keys as &$key){
            if($key->id == $this->actionElementId)
            {
                $date = explode('-', str_replace([':', ' '], '-', date('Y-m-d H:i', strtotime($key->start_time))));
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
                $hour = $date[3];
                $minute = $date[4];

                $this->data['status'] = $key->status;
                $this->data['id'] = $key->id;
                $this->data["period"] = $key->period;
                $this->data["year"] = $year;
                $this->data["month"] = $month;
                $this->data["day"] = $day;
                $this->data["hour"] = $hour;
                $this->data["minutes"] = $minute;
                $this->data["rotation_period"] = $key->rotation_period;
                $this->data["duration"] = $key->duration;
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
            $date = $this->formData['year'].'-'.$this->formData['month'].'-'.$this->formData['days'].' '.$this->formData['hour'].':'.$this->formData['minutes'];
            $content = [
                'status' =>$this->formData['status'],
                "period" => $this->formData['period'],
                "start_time" => $date,
                "rotation_period" => $this->formData['rotation_period'],
                "duration" => $this->formData['duration']
            ];
            $result = $api->backupScheduleUpdate(CustomFields::get($params['serviceid'], 'serverID'), $this->formData['id'], $content);
            if($result->result !== true)
            {
                return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorBackupScheduleEdit');
            }
            return (new HtmlDataJsonResponse())->setStatusSuccess()->setMessageAndTranslate('successBackupScheduleEdit');
        } catch(\Exception $e)
        {
            return (new HtmlDataJsonResponse())->setStatusError()->setMessageAndTranslate('errorBackupScheduleEdit');
        }
    }

    public function delete()
    {

    }
}
