<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;

class DeleteFirewallModal extends BaseModal implements ClientArea, AdminArea
{
    protected $id    = 'deleteFirewallModal';
    protected $name  = 'deleteFirewallModal';
    protected $title = 'deleteFirewallModal';

    public function initContent()
    {
        $this->setConfirmButtonDanger();
        $this->setModalSizeMedium();
        $this->addElement(new \ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer());
        $this->addForm(new \ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms\DeleteFirewallForm());
    }
}
