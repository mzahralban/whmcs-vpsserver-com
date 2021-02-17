<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Forms;


use ModulesGarden\Servers\VpsServer\App\Traits\FormExtendedTrait;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\App\Libs\Product\ProductManager;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Textarea;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Providers\ShowSshKeyDataProvider;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:29
 * Class EditAccountForm
 */
class ShowSshKeyForm extends BaseForm implements ClientArea
{
    protected $id    = 'showSshKeyForm';
    protected $name  = 'showSshKeyForm';
    protected $title = 'showSshKeyForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new ShowSshKeyDataProvider());
        $this->initFields();
        $this->loadDataToForm();
    }

    public function initFields()
    {
        $field = new Textarea('ssh_key');
        $this->addField($field);
    }
}