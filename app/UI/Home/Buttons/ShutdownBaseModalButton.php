<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Buttons;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Modals\ShutdownConfirm;
use ModulesGarden\Servers\VpsServer\Core\Helper\BuildUrl;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;
use const DS;

/**
 * Description of Reboot
 *
 * @author Mateusz Pawłowski <mateusz.pa@modulesgarden.com>
 */
class ShutdownBaseModalButton extends BaseModalButton implements ClientArea, AdminArea
{

    protected $id               = 'shutdownButton'; // atrybut id w tag-u
    protected $name             = 'shutdownButton'; // atrybut name w tagu
    protected $icon             = 'lu-zmdi lu-zmdi-input-power';
    protected $title            = 'shutdownButton';
    protected $customActionName = "vpsActions";

    public function initContent()
    {
        $this->initLoadModalAction(new ShutdownConfirm());
    }


    public function getImage()
    {
        return BuildUrl::getAssetsURL() . DS . 'img' . DS . 'servers' . DS . $this->name . '.png';
    }

}
