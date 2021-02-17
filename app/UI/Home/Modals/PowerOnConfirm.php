<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Modals;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Forms\PowerOnAction;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;

class PowerOnConfirm extends BaseEditModal implements ClientArea, AdminArea
{

    protected $id    = 'powerOnConfirmModal';
    protected $name  = 'powerOnConfirmModal';
    protected $title = 'powerOnConfirmModal';

    public function initContent()
    {
        $this->setModalSizeLarge();
        $this->addForm(new PowerOnAction());
    }

}
