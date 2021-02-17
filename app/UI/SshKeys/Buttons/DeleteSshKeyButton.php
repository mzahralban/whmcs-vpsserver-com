<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Buttons;


use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Modals\DeleteSshKeyModal;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 11:27
 * Class DeleteAccountButton
 */
class DeleteSshKeyButton extends BaseModalButton implements ClientArea
{
    protected $id    = 'deleteSshKeyModal';
    protected $title = 'deleteSshKeyModal';

    public function initContent()
    {
        $this->switchToRemoveBtn();
        $this->initLoadModalAction(new DeleteSshKeyModal());
    }

}