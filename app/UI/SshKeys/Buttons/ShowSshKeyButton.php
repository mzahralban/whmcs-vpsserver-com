<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Buttons;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Modals\ShowSshKeyModal;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Buttons\BaseModalButton;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:29
 * Class EditAccountButton
 */
class ShowSshKeyButton extends BaseModalButton implements ClientArea
{
    protected $id    = 'showSshKeyButton';
    protected $title = 'showSshKeyButton';
    protected $icon = 'lu-zmdi lu-zmdi-eye';
    protected $class  = ['lu-btn lu-btn--sm lu-btn--link lu-btn--icon lu-btn--plain lu-tooltip'];

    public function initContent()
    {
        $this->initLoadModalAction(new ShowSshKeyModal());
    }

}