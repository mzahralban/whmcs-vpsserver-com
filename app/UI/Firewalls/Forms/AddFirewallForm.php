<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms;

use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Select;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Text;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class AddFirewallForm extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'addFirewallForm';
    protected $name  = 'addFirewallForm';
    protected $title = 'addFirewallForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::CREATE);
        $this->setProvider(new \ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Providers\FirewallsProvider());
        $this->initFields();
        $this->loadDataToForm();
    }

    public function initFields()
    {
        $commandData = ['ACCEPT' => 'ACCEPT','DROP' => 'DROP'];
        $field = new Select('command');
        $field->setAvalibleValues($commandData);
        $this->addField($field->notEmpty());

        $field = new Text('address');
        $this->addField($field->notEmpty());
        $field->setDescription('addressDescription');

        $field = new Text('port');
        $this->addField($field);
        $field->setDescription('portDescription');

        $protocolData = ['ICMP' => 'ICMP','IPV6-ICMP' => 'PV6-ICMP','TCP' => 'TCP','UDP' => 'UDP','DCCP' => 'DCCP','SCTP' => 'SCTP'];
        $field = new Select('protocol');
        $field->setAvalibleValues($protocolData)->setSelectedValue('TCP');
        $this->addField($field->notEmpty());

        $api = new Api($this->whmcsParams);
        $networkInterfaces = $api->listNetworkInterfaces(CustomFields::get($this->whmcsParams['serviceid'], 'serverID'));
        foreach($networkInterfaces as $interface)
        {
            $interfacesData[$interface->id] = $interface->label;
        }

        $field = new Select('network_interface_id');
        $field->setAvalibleValues($interfacesData);
        $this->addField($field->notEmpty());
    }
}
