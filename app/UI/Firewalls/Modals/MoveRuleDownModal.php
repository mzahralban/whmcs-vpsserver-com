<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms\MoveRuleDownForm;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:30
 * Class EditAccountModal
 */
class MoveRuleDownModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'MoveRuleDownModal';
    protected $name  = 'MoveRuleDownModal';
    protected $title = 'MoveRuleDownModal';

    public function initContent()
    {
        $this->addForm(new MoveRuleDownForm());
    }
}