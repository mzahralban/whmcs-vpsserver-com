<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Forms;


use ModulesGarden\Servers\VpsServer\App\Traits\FormExtendedTrait;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\App\Libs\Product\ProductManager;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Text;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Hidden;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Textarea;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Providers\EditSshKeyDataProvider;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 09:29
 * Class EditAccountForm
 */
class EditSshKeyForm extends BaseForm implements ClientArea
{
    protected $id    = 'editSshKeyForm';
    protected $name  = 'editSshKeyForm';
    protected $title = 'editSshKeyForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new EditSshKeyDataProvider());
        $this->initFields();
        $this->loadDataToForm();
    }

    public function initFields()
    {
        $field = new Hidden('id');
        $this->addField($field);

        $field = new Text('label');
        $this->addField($field->notEmpty());

        $field = new Textarea('ssh_key');
        $this->addField($field->notEmpty());
    }
}