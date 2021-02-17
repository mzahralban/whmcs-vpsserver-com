<?php

namespace ModulesGarden\Servers\VpsServer\App\Traits;

trait ParamsComponent
{

    protected $params = [];

    public function setParams($params = null)
    {
        $this->params = $params;
    }

}
