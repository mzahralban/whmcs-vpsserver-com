<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Modals;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Forms\RebootInRecoveryModeAction;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;

class RebootInRecoveryModeConfirm extends BaseModal implements ClientArea, AdminArea
{

    protected $id    = 'rebootInRecoveryModeConfirmModal';
    protected $name  = 'rebootInRecoveryModeConfirmModal';
    protected $title = 'rebootInRecoveryModeConfirmModal';

    public function initContent()
    {
        $this->setModalSizeLarge();
        $this->setConfirmButtonDanger();
        $this->addForm(new RebootInRecoveryModeAction());
    }

}
