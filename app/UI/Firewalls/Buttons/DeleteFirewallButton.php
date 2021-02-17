<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;

class DeleteFirewallButton extends BaseModalButton implements ClientArea, AdminArea
{

    protected $id               = 'deleteFirewallButton';
    protected $title            = 'deleteFirewallButton';

    public function initContent()
    {
        $this->switchToRemoveBtn();
        $this->initLoadModalAction(new \ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals\DeleteFirewallModal());
    }

}
