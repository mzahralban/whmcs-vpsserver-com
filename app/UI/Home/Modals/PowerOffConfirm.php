<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Modals;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Forms\PowerOffAction;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;

class PowerOffConfirm extends BaseModal implements ClientArea, AdminArea
{

    protected $id    = 'powerOffConfirmModal';
    protected $name  = 'powerOffConfirmModal';
    protected $title = 'powerOffConfirmModal';

    public function initContent()
    {
        $this->setModalSizeLarge();
        $this->setConfirmButtonDanger();
        $this->addForm(new PowerOffAction());
    }

}
