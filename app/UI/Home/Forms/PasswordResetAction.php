<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Forms;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Providers\PasswordReset;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class PasswordResetAction extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'passwrodResetActionForm';
    protected $name  = 'passwrodResetActionForm';
    protected $title = 'passwrodResetActionForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new PasswordReset());
        $this->setConfirmMessage('confirmResetPassword');
        $this->loadDataToForm();
    }

}
