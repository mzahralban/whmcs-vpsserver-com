<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Modals;

use ModulesGarden\Servers\VpsServer\App\UI\Configuration\Forms\CreateConfigurableAction;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;

class CreateConfigurableOptionsConfirm extends BaseEditModal implements AdminArea
{

    protected $id    = 'createCOConfirmModal';
    protected $name  = 'createCOConfirmModal';
    protected $title = 'createCOConfirmModal';

    public function initContent()
    {
        $this->setModalSizeLarge();
        $this->addForm(new CreateConfigurableAction());
    }

}
