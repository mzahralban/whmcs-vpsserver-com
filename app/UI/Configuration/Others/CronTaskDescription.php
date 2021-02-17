<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Others;

use ModulesGarden\Servers\VpsServer\Core\ModuleConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Others\ModuleDescription;

class CronTaskDescription extends ModuleDescription implements AdminArea
{

    protected $name          = 'cronTaskDescription';
    protected $id            = 'cronTaskDescription';
    protected $title         = 'cronTaskDescription';

    public function initContent()
    {
        $this->setRaw(true);
        $this->setDescription($this->getCronAction());
    }

    private function getCronAction()
    {
        return 'php -q ' . ModuleConstants::getModuleRootDir() . DS . 'cron' . DS . 'cron.php Tasks';
    }

}
