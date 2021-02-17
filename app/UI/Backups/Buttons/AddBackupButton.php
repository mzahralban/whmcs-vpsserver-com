<?php
namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals\AddBackupModal;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\AddIconModalButton;


class AddBackupButton extends AddIconModalButton implements ClientArea
{
    protected $id    = 'addBackupButton';
    protected $title = 'addBackupButton';

    public function initContent()
    {
        $this->initLoadModalAction(new AddBackupModal());
    }
}
