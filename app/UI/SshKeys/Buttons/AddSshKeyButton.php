<?php
namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Buttons;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Modals\AddSshKeyModal;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\AddIconModalButton;


class AddSshKeyButton extends AddIconModalButton implements ClientArea
{
    protected $id    = 'addSshKeyButton';
    protected $title = 'addSshKeyButton';

    public function initContent()
    {
        $this->initLoadModalAction(new AddSshKeyModal());
    }
}
