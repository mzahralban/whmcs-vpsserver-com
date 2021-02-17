<?php
namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Forms;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Text;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Textarea;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Providers\AddSshKeyDataProvider;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 10.09.19
 * Time: 13:06
 * Class AddAccountForm
 */
class AddSshKeyForm extends BaseForm implements ClientArea
{
    protected $id               = 'addSshKeyForm';
    protected $name             = 'addSshKeyForm';
    protected $title            = 'addSshKeyForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::CREATE);
        $this->setProvider(new AddSshKeyDataProvider());
        $this->initFields();
        $this->loadDataToForm();
    }

    public function initFields()
    {
        $field = new Text('label');
        $this->addField($field->notEmpty());

        $field = new Textarea('ssh_key');
        $this->addField($field->notEmpty());
    }
}
