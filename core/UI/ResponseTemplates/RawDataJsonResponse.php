<?php

namespace ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates;

use \ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ResponseInterface;

/**
 * Ajax Raw Data Json Response
 */
class RawDataJsonResponse extends Response implements ResponseInterface
{
    protected $dataType = 'rawData';
}
