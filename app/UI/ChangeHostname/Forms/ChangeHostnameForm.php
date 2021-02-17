<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Forms;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;

class ChangeHostnameForm extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'restoreForm';
    protected $name  = 'restoreForm';
    protected $title = 'restoreForm';

    public function initContent()
    {
        $this->addField(new \ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Text('hostname'));
        $this->loadDataToForm();
    }


}
