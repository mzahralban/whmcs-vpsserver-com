<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals\EditBackupScheduleModal;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:29
 * Class EditAccountButton
 */
class EditBackupScheduleButton extends BaseModalButton implements ClientArea
{
    protected $id    = 'editBackupSButton';
    protected $title = 'editBackupSButton';
    protected $icon = 'lu-zmdi lu-zmdi-edit';
    protected $class  = ['lu-btn lu-btn--sm lu-btn--link lu-btn--icon lu-btn--plain lu-tooltip'];

    public function initContent()
    {
        $this->initLoadModalAction(new EditBackupScheduleModal());
    }

}