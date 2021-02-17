<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Buttons;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Modals\PowerOffConfirm;
use ModulesGarden\Servers\VpsServer\Core\Helper\BuildUrl;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;
use const DS;

class PowerOffBaseModalButton extends BaseModalButton implements ClientArea, AdminArea
{

    protected $id               = 'powerOffButton'; // atrybut id w tag-u
    protected $name             = 'powerOffButton'; // atrybut name w tagu
    protected $icon             = 'lu-zmdi lu-zmdi-power';
    protected $title            = 'powerOffButton';
    protected $customActionName = "vpsActions";

    public function initContent()
    {
        $this->initLoadModalAction(new PowerOffConfirm());
    }

    public function getImage()
    {
        return BuildUrl::getAssetsURL() . DS . 'img' . DS . 'servers' . DS . $this->name . '.png';
    }

}
