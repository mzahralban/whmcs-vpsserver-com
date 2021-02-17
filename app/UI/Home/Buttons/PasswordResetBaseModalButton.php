<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Buttons;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Modals\PasswordResetConfirm;
use ModulesGarden\Servers\VpsServer\Core\Helper\BuildUrl;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;
use const DS;

class PasswordResetBaseModalButton extends BaseModalButton implements ClientArea, AdminArea
{

    protected $id               = 'passwordResetButton'; // atrybut id w tag-u
    protected $name             = 'passwordResetButton'; // atrybut name w tagu
    protected $icon             = 'lu-zmdi lu-zmdi-shield-security';
    protected $title            = 'passwordResetButton';
    protected $customActionName = "vpsActions";

    public function initContent()
    {
        $this->initLoadModalAction(new PasswordResetConfirm());
    }


    public function getImage()
    {
        return BuildUrl::getAssetsURL() . DS . 'img' . DS . 'servers' . DS . $this->name . '.png';
    }

}
