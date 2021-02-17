<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Helpers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Models\Images\Criteria;
use ModulesGarden\Servers\VpsServer\App\Service\ConfigurableOptions\ConfigurableOptions;
use ModulesGarden\Servers\VpsServer\App\Service\ConfigurableOptions\Helper\TypeConstans;
use ModulesGarden\Servers\VpsServer\App\Service\ConfigurableOptions\Models\Option;
use ModulesGarden\Servers\VpsServer\App\Service\ConfigurableOptions\Models\SubOption;

class ConfigurableOptionsBuilder
{

    public static function build(ConfigurableOptions $configurableOptions, $fieldsStatus = [])
    {
        foreach ($fieldsStatus as $key => $field)
        {
            if ($field == "on")
            {
                $configurableOptions->addOption(self::$key());
            }
        }
        return $configurableOptions;
    }

    public static function buildAll(ConfigurableOptions $configurableOptions)
    {
        $configurableOptions
                ->addOption(self::location())
                ->addOption(self::product())
                ->addOption(self::template());

        return $configurableOptions;
    }

    private static function location()
    {
        $locations = Config::getLocations();
        $option  = new Option('location', 'Location', TypeConstans::DROPDOWN);
        foreach ($locations as $key => $name)
        {
            $option->addSubOption(new SubOption($key, $name));
        }
        return $option;
    }

    private static function product()
    {
        $locations = Config::getProducts();
        $option  = new Option('product', 'Product', TypeConstans::DROPDOWN);
        foreach ($locations as $key => $name)
        {
            $option->addSubOption(new SubOption($key, $name));
        }
        return $option;
    }

    private static function template()
    {
        $locations = Config::getTemplates();
        $option  = new Option('template', 'Template', TypeConstans::DROPDOWN);
        foreach ($locations as $key => $name)
        {
            $option->addSubOption(new SubOption($key, $name));
        }
        return $option;
    }

}
