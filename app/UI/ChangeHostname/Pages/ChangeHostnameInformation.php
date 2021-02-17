<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Pages;

use ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Others\ChangeHostnameDescription;
use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;

class ChangeHostnameInformation extends BaseContainer implements ClientArea, AdminArea
{

    protected $id    = 'changeHostname';
    protected $name  = 'changeHostname';
    protected $title = 'changeHostname';

    public function initContent()
    {
        $this->setTitle(Lang::getInstance()->T('changeHostname'));
    }

}
