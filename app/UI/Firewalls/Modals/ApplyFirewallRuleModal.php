<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Modals;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals\BaseEditModal;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms\ApplyFirewallRuleForm;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:30
 * Class EditAccountModal
 */
class ApplyFirewallRuleModal extends BaseEditModal implements ClientArea
{
    protected $id    = 'applyFirewallRuleModal';
    protected $name  = 'applyFirewallRuleModal';
    protected $title = 'applyFirewallRuleModal';

    public function initContent()
    {
        $this->addForm(new ApplyFirewallRuleForm());
    }
}