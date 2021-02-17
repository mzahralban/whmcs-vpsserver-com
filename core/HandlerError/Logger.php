<?php
namespace ModulesGarden\Servers\VpsServer\Core\HandlerError;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use ModulesGarden\Servers\VpsServer\Core\ModuleConstants;
use ModulesGarden\Servers\VpsServer\Core\Interfaces\LoggerInterface;
use ModulesGarden\Servers\VpsServer\Core\FileReader\File;
/**
 * Description of Logger
 * 
 * @author Rafal Ossowski <rafal.os@modulesgarden.com>
 */
class Logger implements LoggerInterface
{
    /**
     * @var \ModulesGarden\Servers\VpsServer\Core\HandlerError\Logger
     */
    protected static $instance;

    protected $name;
    /**
     * @var \Monolog\Logger
     */
    protected $logger;
    protected $mainPath = null;
    protected $handlers = [];

    /**
     * @param string $name
     * @param string $debugName
     * @param string $warningName
     * @param string $errorName
     */
    protected function __construct(
    $name = '', $debugName = '', $warningName = '', $errorName = ''
    )
    {
       return;
    }
    
    private function __clone()
    {
        
    }

    public function isLoggerExist()
    {
        return  isset($this->logger);
    }
    
    public function createLogger()
    {
        $this->logger   = new \Monolog\Logger($this->name);
        //$this->addHandlerToLogger();
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws \ModulesGarden\Servers\VpsServer\Core\HandlerError\Exceptions\MGModuleException
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->logger, $name))
        {
            return $this->logger->{$name}(
                            (isset($arguments[0]) ? $arguments[0] : ''), (isset($arguments[1]) ? $arguments[1] : [])
            );
        }
        
        throw new \ModulesGarden\Servers\VpsServer\Core\HandlerError\Exceptions\MGModuleException(self::class, "Method `{$name}` is not exists.");
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function debug($message, array $context = [])
    {
        //return $this->logger->debug($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function error($message, array $context = [])
    {
        //return $this->logger->error($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function warning($message, array $context = [])
    {
        //return $this->logger->warning($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function err($message, array $context = [])
    {
        return $this->logger->err($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function warn($message, array $context = [])
    {
        //return $this->logger->warn($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function addDebug($message, array $context = [])
    {
        //return $this->logger->addDebug($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function addWarning($message, array $context = [])
    {
        //return $this->logger->addWarning($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function addError($message, array $context = [])
    {
        if (method_exists($this->logger, 'error'))
        {
            return $this->logger->error($message, $context);
        }

    }

    private function addHandlerToLogger()
    {
        $formatter = $this->getFormatter();

        foreach ($this->handlers as $handler)
        {
            $handler->setFormatter($formatter);
            $this->logger->pushHandler($handler);
        }
    }

    private function buildHandlar($path, $type)
    {
        return new StreamHandler($path, $type);
    }

    /**
     * @return LineFormatter
     */
    private function getFormatter()
    {
        return new LineFormatter(null, null, false, true);
    }

    /**
     * @param string $name
     * @param string $debugName
     * @param string $warningName
     * @param string $errorName
     * @return \ModulesGarden\Servers\VpsServer\Core\HandlerError\Logger
     */
    protected static function create(
    $name = 'default', $debugName = 'debug.log', $warningName = 'warning.log', $errorName = 'error.log'
    )
    {
        return new static($name, $debugName, $warningName, $errorName);
    }

    /**
     * @param string $name
     * @param string $debugName
     * @param string $warningName
     * @param string $errorName
     * @return \ModulesGarden\Servers\VpsServer\Core\HandlerError\Logger
     */
    public static function get(
    $name = 'default', $debugName = 'debug.log', $warningName = 'warning.log', $errorName = 'error.log'
    )
    {
        if (!isset(self::$instance))
        {
            self::$instance = self::create($name, $debugName, $warningName, $errorName);
        }
        
        if (self::$instance->isLoggerExist())
        {
            self::$instance->createLogger();
        }
        
        return self::$instance;
    }
}
