<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Forms\AddSshKeyForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;

class AddSshKeyModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'addSshKeyModal';
    protected $name  = 'addSshKeyModal';
    protected $title = 'addSshKeyModal';

    public function initContent()
    {
        $this->addForm(new AddSshKeyForm());
    }
}
