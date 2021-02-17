<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Forms;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Providers\PowerOff;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class PowerOffAction extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'powerOffActionForm';
    protected $name  = 'powerOffActionForm';
    protected $title = 'powerOffActionForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new PowerOff());
        $this->setConfirmMessage('confirmPowerOff');
        $this->loadDataToForm();
    }

}
