<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Graphs\Pages;

use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;

class GraphsPage extends BaseContainer implements ClientArea, AdminArea
{
    protected $id    = 'graphsPage';
    protected $name  = 'graphsPage';
    protected $title = 'graphsPage';

    protected function loadHtml()
    {
    }

    public function initContent()
    {
        $this->customTplVars = ['MGLANG' => Lang::getInstance()];
    }

    protected function loadData()
    {
    }
}
