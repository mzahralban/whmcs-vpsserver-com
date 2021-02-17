<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Modals;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Forms\PasswordResetAction;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;

class PasswordResetConfirm extends BaseModal implements ClientArea, AdminArea
{

    protected $id    = 'passwordResetModal';
    protected $name  = 'passwordResetModal';
    protected $title = 'passwordResetModal';

    public function initContent()
    {
        $this->setModalSizeLarge();
        $this->setConfirmButtonDanger();
        $this->addForm(new PasswordResetAction());
    }

}
