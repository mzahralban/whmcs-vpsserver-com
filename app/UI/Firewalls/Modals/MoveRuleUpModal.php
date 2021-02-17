<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms\MoveRuleUpForm;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:30
 * Class EditAccountModal
 */
class MoveRuleUpModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'MoveRuleUpModal';
    protected $name  = 'MoveRuleUpModal';
    protected $title = 'MoveRuleUpModal';

    public function initContent()
    {
        $this->addForm(new MoveRuleUpForm());
    }
}