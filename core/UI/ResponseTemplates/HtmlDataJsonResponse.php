<?php

namespace ModulesGarden\Servers\VpsServer\Core\UI\ResponseTemplates;

use \ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ResponseInterface;

/**
 *  Ajax Html Data Response
 */
class HtmlDataJsonResponse extends Response implements ResponseInterface
{
    protected $dataType = 'htmlData';
}
