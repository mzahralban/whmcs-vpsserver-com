<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Pages;

use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;

class BackupsInformation extends BaseContainer implements ClientArea, AdminArea
{

    protected $id    = 'backups';
    protected $name  = 'backups';
    protected $title = 'backups';

    public function initContent()
    {
        $this->setTitle(Lang::getInstance()->T('backups'));
    }

}
