<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Modals;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Forms\RebootAction;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;

class RebootConfirm extends BaseModal implements ClientArea, AdminArea
{

    protected $id    = 'rebootConfirmModal';
    protected $name  = 'rebootConfirmModal';
    protected $title = 'rebootConfirmModal';

    public function initContent()
    {
        $this->setModalSizeLarge();
        $this->setConfirmButtonDanger();
        $this->addForm(new RebootAction());
    }

}
