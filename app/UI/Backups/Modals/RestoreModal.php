<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;

class RestoreModal extends BaseModal implements ClientArea, AdminArea
{

    protected $id    = 'restoreModal';
    protected $name  = 'restoreModal';
    protected $title = 'restoreModal';

    public function initContent()
    {
        $this->setModalSizeMedium();
        $this->setConfirmButtonDanger();
        $this->addElement(new \ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer());
        $this->addForm(new \ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms\RestoreForm());
    }

}
