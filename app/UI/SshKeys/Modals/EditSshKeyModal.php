<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Forms\EditSshKeyForm;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:30
 * Class EditAccountModal
 */
class EditSshKeyModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'editSshKeyModal';
    protected $name  = 'editSshKeyModal';
    protected $title = 'editSshKeyModal';

    public function initContent()
    {
        $this->addForm(new EditSshKeyForm());
    }
}