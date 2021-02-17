<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Select;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Text;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class FirewallForm extends BaseForm implements ClientArea, AdminArea
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

        $api = new Api($this->whmcsParams);

        $commandData = ['ACCEPT','DROP'];
        $protocolData = ['ICMP','IPV6-ICMP','TCP','UDP','DCCP','SCTP'];
        $networkInterfaces = [];
            //$api->listNetworkInterfaces(CustomFields::get($this->whmcsParams['serviceid'], 'serverID'));

        foreach($networkInterfaces as $interface)
        {
            $interfacesData[$interface->id] = $interface->label;
        }
        $field = new Select('COMMAND');
        $field->setAvalibleValues($commandData);
        $this->addField($field);

        $field = new Text('ADDRESS');
        $this->addField($field);

        $field = new Text('PORT');
        $this->addField($field);

        $field = new Select('PROTOCOL');
        $field->setAvalibleValues($protocolData);
        $this->addField($field);

        $field = new Select('NETWORK INTERFACE');
        $field->setAvalibleValues($interfacesData);
        $this->addField($field);
    }
}
