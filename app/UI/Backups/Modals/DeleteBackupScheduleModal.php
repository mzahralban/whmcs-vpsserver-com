<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms\DeleteBackupScheduleForm;

class DeleteBackupScheduleModal extends BaseModal implements ClientArea
{

    protected $id    = 'deleteBackupSModal';
    protected $name  = 'deleteBackupSModal';
    protected $title = 'deleteBackupSModal';

    public function initContent()
    {
        $this->setConfirmButtonDanger();
        $this->addForm(new DeleteBackupScheduleForm());
    }

}