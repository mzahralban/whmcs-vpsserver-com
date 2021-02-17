<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Forms;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Providers\RebootInRecoveryMode;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class RebootInRecoveryModeAction extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'rebootInRecoveryModeActionForm';
    protected $name  = 'rebootInRecoveryModeActionForm';
    protected $title = 'rebootInRecoveryModeActionForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new RebootInRecoveryMode());
        $this->setConfirmMessage('confirmRebootInRecoveryMode');
        $this->loadDataToForm();
    }

}
