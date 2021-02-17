<?php

namespace ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates;

use \ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ResponseInterface;

/**
 *  Ajax Json Data Response
 */
class DataJsonResponse extends Response implements ResponseInterface
{
    protected $dataType = 'data';
}
