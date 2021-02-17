<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseModal;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Forms\DeleteSshKeyForm;

class DeleteSshKeyModal extends BaseModal implements ClientArea
{

    protected $id    = 'deleteSshKeyModal';
    protected $name  = 'deleteSshKeyModal';
    protected $title = 'deleteSshKeyModal';

    public function initContent()
    {
        $this->setConfirmButtonDanger();
        $this->addForm(new DeleteSshKeyForm());
    }

}