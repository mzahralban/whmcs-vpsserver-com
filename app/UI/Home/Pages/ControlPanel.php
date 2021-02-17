<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Pages;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Buttons\PowerOffBaseModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Home\Buttons\PowerOnBaseModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Home\Buttons\RebootBaseModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Home\Buttons\RebootInRecoveryModeBaseModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Home\Helpers\EnabledOptions;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;

class ControlPanel extends BaseContainer implements ClientArea, AdminArea
{
    
    public function initContent()
    {
        $this->addButton(new PowerOnBaseModalButton());
        $this->addButton(new PowerOffBaseModalButton());

        $this->addButton(new RebootBaseModalButton);
        $this->addButton(new RebootInRecoveryModeBaseModalButton());

//        $this->addButton(new PasswordResetBaseModalButton());
    }

}
