<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Forms\ShowSshKeyForm;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:30
 * Class EditAccountModal
 */
class ShowSshKeyModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'showSshKeyModal';
    protected $name  = 'showSshKeyModal';
    protected $title = 'showSshKeyModal';

    public function initContent()
    {
        $this->addForm(new ShowSshKeyForm());
    }
}