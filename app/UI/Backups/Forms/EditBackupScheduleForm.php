<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms;


use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\App\Traits\FormExtendedTrait;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Text;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseDateForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Hidden;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Select;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Sections\ThreePageSection;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Providers\EditBackupScheduleDataProvider;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:29
 * Class EditAccountForm
 */
class EditBackupScheduleForm extends BaseDateForm implements ClientArea
{
    protected $id    = 'editBackupSForm';
    protected $name  = 'editBackupSForm';
    protected $title = 'editBackupSForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new EditBackupScheduleDataProvider());
        $this->initFields();
        $this->loadDataToForm();
    }

    public function initFields()
    {

        $field = new Hidden('id');
        $this->addField($field->notEmpty()); 

        $field = new Text('duration');
        $this->addField($field->notEmpty());

        $params = Params::moduleParams($_REQUEST['id']);
        $api = new Api($params);
        $keys = $api->listBackupsSchedules(CustomFields::get($params['serviceid'], 'serverID'));

        foreach ($keys as &$key){
            if($key->id == $_REQUEST['actionElementId'])
            {
                break;
            }
        }

        $field = new Select('period');
        $data = [
            'days' => 'Days', 'weeks' => 'Weeks', 'months' => 'Months', 'years' => 'Years'
        ];
        $field->setAvalibleValues($data);
        $field->setSelectedValue($key->period);
        $this->addField($field->notEmpty());

        $field = new Text('rotation_period');
        $this->addField($field->notEmpty());

        $field = new Select('status');
        $field->setSelectedValue($key->status);
        $data = [
            'enabled' => 'Enabled', 'disabled' => 'Disabled'
        ];
        $field->setAvalibleValues($data);
        $this->addField($field->notEmpty()); 
        
        $params = Params::moduleParams($_REQUEST['id']);
        $api = new Api($params);
        $keys = $api->listBackupsSchedules(CustomFields::get($params['serviceid'], 'serverID'));
        
        foreach ($keys as &$key){
            if($key->id == $_REQUEST['actionElementId'])
            {
                $date = explode('-', str_replace([':', ' '], '-', date('Y-m-d H:i', strtotime($key->start_time))));
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
                $hour = $date[3];
                $minute = $date[4];
            }
        }
        $this->addSection($this->leftSection($year, $month, $day));
        $this->addSection($this->rightSection($hour, $minute));

        $this->loadDataToForm();
    }

    private function leftSection($year, $month, $day)
    {
        $section = new ThreePageSection('leftSection');
 
        $field = new Select('year');
        $data = ['2021' => '2021', '2022' => '2022', '2023' => '2023', '2024' => '2024', '2025' => '2025',
        '2026' => '2026', '2027' => '2027', '2028' => '2028', '2029' => '2029', '2030' => '2030'];
        $field->setAvalibleValues($data);
        $field->setSelectedValue($year);
        $section->addField($field);

        $field = new Select('month');
        $data = ['01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June',
                 '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];
        $field->setAvalibleValues($data);
        $field->setSelectedValue($month);
        $section->addField($field);

        $field = new Select('days');
        $i = 0;
        for($i; $i < 32; $i++)
        {
            $j = $i;
            
            if($i < 10)
            {
                $j = '0'.$i;
            }
            $data[$j] = $j;
        }
        $field->setAvalibleValues($data);
        $field->setSelectedValue($day);
        $section->addField($field);
        return $section;
    }
    
    private function rightSection($hour, $minute)
    {
        $section = new ThreePageSection('rightSection');
 
        $field = new Select('hour');
        $i = 0;
        for($i; $i < 24; $i++)
        {
            $j = $i;
            
            if($i < 10)
            {
                $j = '0'.$i;
            }
            $data[$j] = $j;
        }
        $field->setAvalibleValues($data);
        $field->setSelectedValue($hour);
        $section->addField($field);

        $field = new Select('minutes');
        for($i; $i < 60; $i++)
        {
            $j = $i;
            
            if($i < 10)
            {
                $j = '0'.$i;
            }
            $data[$j] = $j;
        }
        $field->setAvalibleValues($data);
        $field->setSelectedValue($minute);
        $section->addField($field);
        return $section;
    }
}