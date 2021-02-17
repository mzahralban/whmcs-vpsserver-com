<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms\AddBackupForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;

class AddBackupModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'addBackupModal';
    protected $name  = 'addBackupModal';
    protected $title = 'addBackupModal';

    public function initContent()
    {
        $this->addForm(new AddBackupForm());
    }
}
