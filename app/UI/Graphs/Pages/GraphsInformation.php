<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Graphs\Pages;

use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;

class GraphsInformation extends BaseContainer implements ClientArea, AdminArea
{

    protected $id    = 'GraphsInformation';
    protected $name  = 'GraphsInformation';
    protected $title = 'GraphsInformation';

    public function initContent()
    {
        $this->setTitle(Lang::getInstance()->T('GraphsInformation'));
    }

}
