<?php

namespace ModulesGarden\Servers\VpsServer\App\Traits;

use ModulesGarden\Servers\VpsServer\App\Models;

/**
 * HostingComponent trait
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
trait HostingComponent
{

    protected $hosting = null;

    public function initHosting($id)
    {
        $this->hosting = \ModulesGarden\Servers\VpsServer\Core\Models\Whmcs\Hosting::where('id', $id)->first();
    }

}
