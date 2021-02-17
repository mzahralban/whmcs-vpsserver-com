<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\AddIconModalButton;

class AddFirewallButton extends AddIconModalButton implements ClientArea, AdminArea
{

    protected $id               = 'addFirewallButton';
    protected $title            = 'addFirewallButton';

    public function initContent()
    {
        $this->initLoadModalAction(new \ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals\AddFirewallModal());
    }

}
