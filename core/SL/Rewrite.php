<?php

namespace ModulesGarden\Servers\VpsServer\Core\SL;

use ModulesGarden\Servers\VpsServer\Core\ModuleConstants;

/**
 * Description of Register
 *
 * @author Rafał Ossowski <rafal.os@modulesgarden.com>
 */
class Rewrite extends AbstractReaderYml
{

    protected function load()
    {
        $dataDev = $this->readYml(ModuleConstants::getFullPath('app', 'Config', 'di', 'rewrite.yml'));
        $data    = [];
        if (isset($dataDev) && isset($dataDev['class']))
        {
            foreach ($dataDev['class'] as $class)
            {
                if (!isset($data[$class['old']]) && $this->checkInheritance($class['old'], $class['new']))
                {
                    $data[$class['old']] = $class['new'];
                }
            }
        }

        $this->data = $data;
    }

    protected function checkInheritance($old, $new)
    {
        if (is_subclass_of($new, $old))
        {
            return true;
        }
        return false;
    }
}
