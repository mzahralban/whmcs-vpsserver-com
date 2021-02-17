<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons;


use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals\DeleteBackupScheduleModal;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 11:27
 * Class DeleteAccountButton
 */
class DeleteBackupScheduleButton extends BaseModalButton implements ClientArea
{
    protected $id    = 'deleteBackupSButton';
    protected $title = 'deleteBackupSButton';

    public function initContent()
    {
        $this->switchToRemoveBtn();
        $this->initLoadModalAction(new DeleteBackupScheduleModal());
    }

}