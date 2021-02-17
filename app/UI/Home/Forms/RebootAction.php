<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Forms;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Providers\Reboot;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

class RebootAction extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'rebootActionForm';
    protected $name  = 'rebootActionForm';
    protected $title = 'rebootActionForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new Reboot());
        $this->setConfirmMessage('confirmReboot');
        $this->loadDataToForm();
    }

}
