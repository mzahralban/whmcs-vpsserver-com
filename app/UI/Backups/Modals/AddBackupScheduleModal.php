<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms\AddBackupScheduleForm;

class AddBackupScheduleModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'addBackupScheduleModal';
    protected $name  = 'addBackupScheduleModal';
    protected $title = 'addBackupScheduleModal';

    public function initContent()
    {
        $this->addForm(new AddBackupScheduleForm());
    }
}
