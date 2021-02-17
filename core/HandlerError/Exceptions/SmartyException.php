<?php

namespace ModulesGarden\Servers\VpsServer\Core\HandlerError\Exceptions;

/**
 * Description of ServiceLocatorException
 *
 * @author Rafał Ossowski <rafal.os@modulesgarden.com>
 */
class SmartyException extends MGModuleException
{
    public function __construct($class, $message, $code, $previous = null)
    {
        parent::__construct($class, $message, $code, $previous);
    }
}
