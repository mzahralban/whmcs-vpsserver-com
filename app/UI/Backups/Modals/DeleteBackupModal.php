<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms\DeleteBackupForm;

class DeleteBackupModal extends BaseModal implements ClientArea
{

    protected $id    = 'deleteBackupModal';
    protected $name  = 'deleteBackupModal';
    protected $title = 'deleteBackupModal';

    public function initContent()
    {
        $this->setConfirmButtonDanger();
        $this->addForm(new DeleteBackupForm());
    }

}