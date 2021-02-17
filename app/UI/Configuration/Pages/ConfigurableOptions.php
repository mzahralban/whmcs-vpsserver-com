<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Pages;

use ModulesGarden\Servers\VpsServer\App\Service\ConfigurableOptions\ConfigurableOptions as ConfigurableOptionsService;
use ModulesGarden\Servers\VpsServer\App\UI\Configuration\Buttons\CreateConfigurableOptionsBaseModalButton;
use ModulesGarden\Servers\VpsServer\App\UI\Configuration\Helpers\ConfigurableOptionsBuilder;
use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;

class ConfigurableOptions extends BaseContainer implements ClientArea, AdminArea
{

    protected $id    = 'configurableOptions';
    protected $name  = 'configurableOptions';
    protected $title = 'configurableOptions';

    public function initContent()
    {
        $this->setTitle(Lang::getInstance()->T('configurableOptions'));

        $this->addButton(new CreateConfigurableOptionsBaseModalButton());
    }

    public function getOptions()
    {
        $configurableOptions = new ConfigurableOptionsService($_REQUEST['id']);
        ConfigurableOptionsBuilder::buildAll($configurableOptions);

        $fields = $configurableOptions->show();
        $fields['emptyFields'] = "";

        return $fields;
    }

}
