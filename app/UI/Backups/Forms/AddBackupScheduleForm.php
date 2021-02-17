<?php
namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseDateForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Text;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Select;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Sections\ThreePageSection;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Providers\AddBackupScheduleDataProvider;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 10.09.19
 * Time: 13:06
 * Class AddAccountForm
 */
class AddBackupScheduleForm extends BaseDateForm implements ClientArea
{
    protected $id               = 'addBackupSForm';
    protected $name             = 'addBackupSForm';
    protected $title            = 'addBackupSForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::CREATE);
        $this->setProvider(new AddBackupScheduleDataProvider());
        $params = Params::moduleParams($_REQUEST['id']);
        $api = new Api($params);
        $disks = $api->listServerDisks(CustomFields::get($params['serviceid'], 'serverID'));

        foreach($disks as $disk)
        {
            if($disk->is_primary)
            {
                $data[$disk->id] = $disk->label.' ('.$disk->size.' GB - primary)';
            } else {
                $data[$disk->id] = $disk->label.' ('.$disk->size.' GB)';
            }
        }
        $field = new Select('disks');
        $field->setAvalibleValues($data);
        $this->addField($field->notEmpty());

        $field = new Text('duration');
        $this->addField($field->notEmpty());

        $field = new Select('period');
        $data = [
            'days' => 'Days', 'weeks' => 'Weeks', 'Months' => 'months', 'years' => 'Years'
        ];
        $field->setAvalibleValues($data);
        $this->addField($field->notEmpty());

        $field = new Text('rotation_period');
        $this->addField($field->notEmpty());

        $this->addSection($this->leftSection());

        $this->addSection($this->rightSection());

        $this->loadDataToForm();
    }

    private function leftSection()
    {
        $year = date('Y');
        $month = date('m');
        $day = date('d');

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
    
    private function rightSection()
    {
        $section = new ThreePageSection('rightSection');
 
        $hour = date('H');
        $minute = date('i');

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
