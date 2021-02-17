<?php
/**
 * User: inbs
 * Date: 11.01.18
 * Time: 15:53
 */

namespace ModulesGarden\Servers\VpsServer\Core\UI\Widget;

use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;

class HookAdapter extends BaseContainer
{
    protected $name = 'hookAdapter';
    protected $data = [];
    protected $adaptId = '';

    public function adapt()
    {
        return $this->adaptId;
    }
}