<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\AddIconModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals\ApplyFirewallRuleModal;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:29
 * Class EditAccountButton
 */
class ApplyFirewallRuleButton extends AddIconModalButton implements ClientArea
{
    protected $id    = 'applyFirewallRuleButton';
    protected $title = 'applyFirewallRuleButton';
    protected $icon = 'lu-zmdi lu-zmdi-play';

    public function initContent()
    {
        $this->initLoadModalAction(new ApplyFirewallRuleModal());
    }
}