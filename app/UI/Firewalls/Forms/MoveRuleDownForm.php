<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Forms;

use ModulesGarden\Servers\VpsServer\App\Traits\FormExtendedTrait;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\App\Libs\Product\ProductManager;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Hidden;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Providers\MoveRuleDownDataProvider;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:29
 * Class EditAccountForm
 */
class MoveRuleDownForm extends BaseForm implements ClientArea
{
    protected $id    = 'MoveRuleDownForm';
    protected $name  = 'MoveRuleDownForm';
    protected $title = 'MoveRuleDownForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new MoveRuleDownDataProvider());

        $this->setConfirmMessage('confirmFirewallDown');

        $this->initFields();
        $this->loadDataToForm();
    }

    public function initFields()
    {
        $field = new Hidden('id');
        $this->addField($field);
    }
}