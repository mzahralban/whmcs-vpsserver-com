<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Forms;

use ModulesGarden\Servers\VpsServer\App\Helpers\FieldsProvider;
use ModulesGarden\Servers\VpsServer\App\UI\Configuration\Helpers\Config;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Select;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Sections\HalfPageSection;

class ConfigFields extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'ConfigFields';
    protected $name  = 'ConfigFields';
    protected $title = 'ConfigFields';

    public function getClass()
    {
        
    }

    public function initContent()
    {
        $config = new FieldsProvider($_REQUEST['id']);


        $this->addSection($this->leftSection($config));
        $this->addSection($this->rightSection($config));
        $this->loadDataToForm();
    }

    private function leftSection(FieldsProvider $config)
    {

        $section = new HalfPageSection('leftSection');
        $section->addField($this->getLocationField($config->getField('location')));
        $section->addField($this->getTemplateField($config->getField('template')));
       
        // $section->addField($this->getFloatingIpsNumberField($config->getField('floatingIpsNumber')));
        //        $section->addField($this->getDataCenterField($config->getField('datacenter')));


        return $section;
    }

    private function rightSection(FieldsProvider $config)
    {
        $section = new HalfPageSection('rightSection');

        $section->addField($this->getProductsField($config->getField('product')));
        // $section->addField($this->getTypeField($config->getField('type')));

        // $section->addField($this->getFloatingIpsNumberField($config->getField('floatingIpsNumber')));
//        $section->addField($this->getVolumeField($config->getField('volume')));
//        $section->addField($this->getSnapshotsField($config->getField('snapshots')));
//        $section->addField($this->getUserDataField($config->getField('userData')));
//        $section->addField($this->getRandomDomainPrefixField($config->getField('randomDomainPrefix')));
//        $section->addField($this->getBackupsEnabledField($config->getField('enableBackups')));

        return $section;
    }

    private function getLocationField($value = null)
    {
        $field = new Select('packageconfigoption[location]');
        $field->setAvalibleValues(Config::getLocations());
        $field->setDescription('locationDescription');
        $field->setValue($value);
        $field->setSelectedValue($value);
        return $field;
    }

    // private function getDataCenterField($value = null)
    // {
    //     $field = new Select('packageconfigoption[datacenter]');
    //     $field->setAvalibleValues(Config::getDatacenter());
    //     $field->setDescription('datacenterDescription');
    //     $field->setValue($value);
    //     $field->setSelectedValue($value);
    //     return $field;
    // }

    private function getTemplateField($value = null)
    {
        $field = new Select('packageconfigoption[template]');
        $field->setAvalibleValues(Config::getTemplates());
        $field->setDescription('templateDescription');
        $field->setValue($value);
        $field->setSelectedValue($value);
        return $field;
    }

     private function getProductsField($value = null)
     {
         $field = new Select('packageconfigoption[product]');
         $field->setAvalibleValues(Config::getProducts());
         $field->setDescription('productDescription');
         $field->setValue($value);
         $field->setSelectedValue($value);
         return $field;
     }

    // private function getVolumeField($value = null)
    // {
    //     $field = new Text('packageconfigoption[volume]');
    //     $field->setDescription('volumeDescription');
    //     $field->setValue($value);
    //     return $field;
    // }

    // private function getSnapshotsField($value = null)
    // {
    //     $field = new Number();
    //     $field->setName('packageconfigoption[snapshots]');
    //     $field->setTitle('packageconfigoption[snapshots]');
    //     $field->setDescription('snapshotsDescription');
    //     $field->setValue($value);
    //     return $field;
    // }

    // private function getUserDataField($value = null)
    // {
    //     $field = new Select('packageconfigoption[userdata]');
    //     $field->setAvalibleValues(UserData::getFilesNames());
    //     $field->setDescription('userdatadescription');
    //     $field->setValue($value);
    //     $field->setSelectedValue($value);
    //     return $field;
    // }

    // private function getRandomDomainPrefixField($value = null)
    // {
    //     $field = new Text('packageconfigoption[randomDomainPrefix]');
    //     $field->setDescription('randomDomainPrefixDescription');
    //     $field->setValue($value);
    //     return $field;
    // }

    // private function getFloatingIpsNumberField($value = null)
    // {
    //     $field = new Number();
    //     $field->setName('packageconfigoption[floatingIpsNumber]');
    //     $field->setTitle('packageconfigoption[floatingIpsNumber]');
    //     $field->setDescription('floatingIpsNumberDescription');
    //     $field->setValue($value);
    //     return $field;
    // }

    // private function getBackupsEnabledField($value = null)
    // {
    //     $field = new Switcher();
    //     $field->setName('packageconfigoption[enableBackups]');
    //     $field->setTitle('packageconfigoption[enableBackups]');
    //     $field->setDescription('enableBackupsDescription');
    //     $field->setValue($value);

    //     return $field;
    // }


}
