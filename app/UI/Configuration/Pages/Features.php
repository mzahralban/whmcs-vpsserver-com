<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Pages;

use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;

class Features extends BaseContainer implements ClientArea, AdminArea
{

    protected $id    = 'featuresForm';
    protected $name  = 'featuresForm';
    protected $title = 'featuresForm';

    public function initContent()
    {
        $this->setTitle(\ModulesGarden\Servers\VpsServer\Core\Helper\Lang::getInstance()->T('featuresForm'));
        $this->addElement(new \ModulesGarden\Servers\VpsServer\App\UI\Configuration\Forms\ClientAreaFeatures());
    }

}
