<?php

namespace ModulesGarden\Servers\VpsServer\App\Helpers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;

class TestConnection
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function testConnection()
    {
        $api            = new Api($this->params);
        $testConnection = $api->testConnection();
        return $testConnection;
    }
}
