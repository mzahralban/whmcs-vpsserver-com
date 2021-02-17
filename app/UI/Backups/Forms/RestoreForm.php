<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms;

use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\Core\UI\Helpers\AlertTypesConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;

class RestoreForm extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'restoreForm';
    protected $name  = 'restoreForm';
    protected $title = 'restoreForm';

    public function initContent()
    {
        $this->setFormType('restore');
        $this->setProvider(new \ModulesGarden\Servers\VpsServer\App\UI\Backups\Providers\BackupsProvider());
        $this->loadProvider();
        Lang::getInstance()->addReplacementConstant('description' ,$this->dataProvider->getValueById('description'));
        $this->setInternalAllertMessage('restoreConfirm');
        $this->setInternalAllertMessageType(AlertTypesConstants::DANGER);
        $this->addField(new \ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Hidden('id'));
        $this->addField(new \ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Hidden('description'));

        $this->loadDataToForm();
    }

    public function getAllowedActions()
    {
        return ['restore'];
    }


}
