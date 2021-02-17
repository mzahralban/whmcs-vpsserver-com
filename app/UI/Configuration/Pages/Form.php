<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Pages;

use ModulesGarden\Servers\VpsServer\App\Models\TaskHistory;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;

class Form extends BaseContainer implements ClientArea, AdminArea
{

    protected $id    = 'configurationForm';
    protected $name  = 'configurationForm';
    protected $title = 'configurationForm';

    public function initContent()
    {
        $this->setTitle(\ModulesGarden\Servers\VpsServer\Core\Helper\Lang::getInstance()->T('configurationForm'));
        $this->addElement(new \ModulesGarden\Servers\VpsServer\App\UI\Configuration\Forms\ConfigFields());
    }

}
