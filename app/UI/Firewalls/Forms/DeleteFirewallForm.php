<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms;

use ModulesGarden\Servers\VpsServer\Core\UI\Helpers\AlertTypesConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Hidden;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class DeleteFirewallForm extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'deleteFirewallForm';
    protected $name  = 'deleteFirewallForm';
    protected $title = 'deleteFirewallForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::DELETE);
        $this->dataProvider = new \ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Providers\FirewallsProvider();
        $this->setInternalAllertMessage('confirmRemoveFirewall');
        $this->setInternalAllertMessageType(AlertTypesConstants::DANGER);

        $field = new Hidden();
        $field->setId('id');
        $field->setName('id');
        $this->addField($field);

        $this->loadDataToForm();

    }


}
