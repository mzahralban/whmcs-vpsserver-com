<?php
namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\AddIconModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals\AddBackupScheduleModal;


class AddBackupScheduleButton extends AddIconModalButton implements ClientArea
{
    protected $id    = 'addBackupScheduleButton';
    protected $title = 'addBackupScheduleButton';

    public function initContent()
    {
        $this->initLoadModalAction(new AddBackupScheduleModal());
    }
}
