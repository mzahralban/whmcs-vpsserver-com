<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals\MoveRuleDownModal;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:29
 * Class EditAccountButton
 */
class MoveRuleDownButton extends BaseModalButton implements ClientArea
{
    protected $id    = 'moveRuleDownButton';
    protected $title = 'moveRuleDownButton';
    protected $icon = 'lu-zmdi lu-zmdi-long-arrow-down';
    protected $class  = ['lu-btn lu-btn--sm lu-btn--link lu-btn--icon lu-btn--plain lu-tooltip'];

    public function initContent()
    {
        $this->initLoadModalAction(new MoveRuleDownModal());
    }

}