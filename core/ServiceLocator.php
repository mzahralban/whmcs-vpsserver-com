<?php

namespace ModulesGarden\Servers\VpsServer\Core;

/**
 * Class ServiceLocator
 * @package ModulesGarden\ModuleFramework\Core
 * @TODO remove that class //MM
 */
class ServiceLocator extends  \ModulesGarden\Servers\VpsServer\Core\DependencyInjection\DependencyInjection
{
    /**
     * @var bool
     * @TODO - move it to different class //MM
     */
    public static $isDebug = true;
}
