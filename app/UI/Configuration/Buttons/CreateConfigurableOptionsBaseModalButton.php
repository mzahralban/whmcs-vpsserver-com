<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Buttons;

use ModulesGarden\Servers\VpsServer\App\UI\Configuration\Modals\CreateConfigurableOptionsConfirm;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\AddIconModalButton;

class CreateConfigurableOptionsBaseModalButton extends AddIconModalButton implements AdminArea {

    protected $id             = 'createCOBaseModalButton'; // atrybut id w tag-u
    protected $name           = 'createCOBaseModalButton'; // atrybut name w tagu
    protected $title          = 'createCOBaseModalButton';
    protected $class          = ['lu-btn lu-btn-circle lu-btn--success lu-btn-icon-only'];
    protected $htmlAttributes = [
        'href' => 'javascript:;',
    ];

    public function initContent() {
        $this->initLoadModalAction(new CreateConfigurableOptionsConfirm());
    }

}
