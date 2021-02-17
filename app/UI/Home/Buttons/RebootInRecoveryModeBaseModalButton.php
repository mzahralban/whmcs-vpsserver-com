<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Buttons;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Modals\RebootInRecoveryModeConfirm;
use ModulesGarden\Servers\VpsServer\Core\Helper\BuildUrl;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;
use const DS;

class RebootInRecoveryModeBaseModalButton extends BaseModalButton implements ClientArea, AdminArea
{

    protected $id               = 'rebootInRecoveryModeButton'; // atrybut id w tag-u
    protected $name             = 'rebootInRecoveryModeButton'; // atrybut name w tagu
    protected $icon             = 'lu-zmdi lu-zmdi-refresh';
    protected $title            = 'rebootInRecoveryModeButton';
    protected $customActionName = "vpsActions";

    public function initContent()
    {
        $this->initLoadModalAction(new RebootInRecoveryModeConfirm());
    }

    public function getImage()
    {
        return BuildUrl::getAssetsURL() . DS . 'img' . DS . 'servers' . DS . $this->name . '.png';
    }

}
