<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;

class RestoreButton extends BaseModalButton implements ClientArea, AdminArea
{

    protected $id               = 'restoreButton';
    protected $class            = ['lu-btn lu-btn--sm lu-btn--link lu-btn--icon lu-btn--plain lu-tooltip'];
    protected $icon             = 'lu-zmdi lu-zmdi-time-restore-setting';  // cion
    protected $title            = 'restoreButton';
    protected $customActionName = "mountModal";

    public function initContent()
    {
        $this->initLoadModalAction(new \ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals\RestoreModal());
    }

}
