<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Forms;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Providers\PowerOn;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class PowerOnAction extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'powerOnActionForm';
    protected $name  = 'powerOnActionForm';
    protected $title = 'powerOnActionForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new PowerOn());
        $this->setConfirmMessage('confirmPowerOn');
        $this->loadDataToForm();
    }

}
