<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;

class FirewallModal extends BaseModal implements ClientArea, AdminArea
{
    protected $id    = 'addFirewallModal';
    protected $name  = 'addFirewallModal';
    protected $title = 'addFirewallModal';

    public function initContent()
    {
        $this->setModalSizeMedium();
        $this->addElement(new \ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer());
        $this->addForm(new \ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms\FirewallForm());
    }
}
