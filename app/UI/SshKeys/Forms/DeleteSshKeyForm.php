<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Forms;


use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Hidden;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Helpers\AlertTypesConstants;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Providers\DeleteSshKeyDataProvider;
use ModulesGarden\Servers\VpsServer\App\UI\Client\EmailAccount\Providers\DeleteAccountDataProvider;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 18.09.19
 * Time: 11:28
 * Class DeleteAccountForm
 */
class DeleteSshKeyForm extends BaseForm implements ClientArea
{
    protected $id    = 'deleteSshKeyForm';
    protected $name  = 'deleteSshKeyForm';
    protected $title = 'deleteSshKeyForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::DELETE);
        $this->dataProvider = new DeleteSshKeyDataProvider();
        $this->setInternalAllertMessage('confirmRemoveAccount');
        $this->setInternalAllertMessageType(AlertTypesConstants::DANGER);

        $field = new Hidden('id');
        $this->addField($field);

        $this->loadDataToForm();
    }
}