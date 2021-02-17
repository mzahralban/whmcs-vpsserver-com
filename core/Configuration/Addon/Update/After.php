<?php

namespace ModulesGarden\Servers\VpsServer\Core\Configuration\Addon\Update;

use ModulesGarden\Servers\VpsServer\Core\Configuration\Addon\AbstractAfter;

/**
 * Description of After
 *
 * @author Rafał Ossowski <rafal.os@modulesgarden.com>
 */
class After extends AbstractAfter
{

    /**
     * @return array
     */
    public function execute(array $params = [])
    {
        return $params;
    }

}
