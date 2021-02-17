<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms\EditBackupScheduleForm;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:30
 * Class EditAccountModal
 */
class EditBackupScheduleModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'editBackupSModal';
    protected $name  = 'editBackupSModal';
    protected $title = 'editBackupSModal';

    public function initContent()
    {
        $this->addForm(new EditBackupScheduleForm());
    }
}