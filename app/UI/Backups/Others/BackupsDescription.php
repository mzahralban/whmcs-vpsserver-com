<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Others;

use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Others\ModuleDescription;

class BackupsDescription extends ModuleDescription implements AdminArea
{

    protected $name          = 'cronTaskDescription';
    protected $id            = 'cronTaskDescription';
    protected $title         = 'cronTaskDescription';

    public function initContent()
    {
        $this->setDescription('desc');
    }

    public static function getClass() {
        return BackupsDescription::class;
    }

}
