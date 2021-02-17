<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Forms;

use ModulesGarden\Servers\VpsServer\App\UI\Configuration\Providers\ConfigurableOptionManage;
use ModulesGarden\Servers\VpsServer\Core\UI\Helpers\AlertTypesConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class CreateConfigurableAction extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'createConfigurableAction';
    protected $name  = 'createConfigurableAction';
    protected $title = 'createConfigurableAction';

    public function getClass()
    {
        
    }

    public function initContent()
    {
        $this->setFormType(FormConstants::CREATE);

        $this->loadLang();
        $this->lang->addReplacementConstant('configurableOptionsNameUrl', '<a style="    color: #31708f; text-decoration: underline;" href="https://docs.whmcs.com/Addons_and_Configurable_Options" target="blank">here</a>');

        $this->addInternalAllert('configurableOptionsNameInfo', AlertTypesConstants::INFO, AlertTypesConstants::SMALL);
        $this->setProvider(new ConfigurableOptionManage());
        $dataProvider = $this->getFormData();
        if (is_array($dataProvider['fields']))
        {
            foreach ($dataProvider['fields'] as $key => $name)
            {
                $this->addField((new \ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Switcher($key))->setDefaultValue('on')->setRawTitle($key . '|' . $name));
            }
        }
        $this->loadDataToForm();
    }

}
