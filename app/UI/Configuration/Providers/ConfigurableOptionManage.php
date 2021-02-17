<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Providers;

use Exception;
use ModulesGarden\Servers\VpsServer\App\Service\ConfigurableOptions\ConfigurableOptions;
use ModulesGarden\Servers\VpsServer\App\UI\Configuration\Helpers\ConfigurableOptionsBuilder;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates\HtmlDataJsonResponse;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\DataProviders\BaseDataProvider;

class ConfigurableOptionManage extends BaseDataProvider implements AdminArea
{

    public function read()
    {
        $configurableOption = new ConfigurableOptions($this->getRequestValue('id', 0));
        ConfigurableOptionsBuilder::buildAll($configurableOption);
        $this->data         = [
            'fields' => $configurableOption->show()
        ];
    }

    public function create()
    {
        try
        {
            $configurableOption = new ConfigurableOptions($this->getRequestValue('id', 0));
            ConfigurableOptionsBuilder::build($configurableOption, $this->formData);
            $status             = $configurableOption->createOrUpdate();
            $msg                = ($status) ? 'configurableOptionsCreate' : 'configurableOptionsUpdate';
            return (new HtmlDataJsonResponse())
                            ->setStatusSuccess()
                            ->setCallBackFunction('redirectToConfigurableOptionsTab')
                            ->setMessageAndTranslate($msg);
        }
        catch (Exception $ex)
        {
            return (new HtmlDataJsonResponse())
                            ->setStatusError()
                            ->setMessage($ex->getMessage());
        }
    }

    public function delete()
    {
        
    }

    public function update()
    {
        
    }

}
