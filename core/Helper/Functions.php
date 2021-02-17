<?php

namespace ModulesGarden\Servers\VpsServer\Core\Helper;

use ModulesGarden\Servers\VpsServer\Core\Http\JsonResponse;
use ModulesGarden\Servers\VpsServer\Core\Http\RedirectResponse;
use ModulesGarden\Servers\VpsServer\Core\Http\Response;
use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\Core\ServiceLocator;
use ModulesGarden\Servers\VpsServer\Core\DependencyInjection;
use ModulesGarden\Servers\VpsServer\Core\ModuleConstants;
use ModulesGarden\Servers\VpsServer\Core\Cache\CacheManager;
use ModulesGarden\Servers\VpsServer\Core\Logger\Entity;

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\json'))
{

    /**
     * @param array $data
     * @return JsonResponse
     */
    function json(array $data = [])
    {
        $data = ['data' => $data];
        return JsonResponse::create($data);
    }
}



if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\response'))
{

    /**
     * @param array $data
     * @return \ModulesGarden\Servers\VpsServer\Core\Http\Response
     */
    function response(array $data = [])
    {
        return Response::create()->setData($data);
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\cache'))
{

    /**
     * @param array $data
     * @return \ModulesGarden\Servers\VpsServer\Core\Interfaces\CacheManagerInterface
     */
    function cache($key = null)
    {
        return ($key === null) ? CacheManager::cache() : CacheManager::cache($key);
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\redirect'))
{

    /**
     * @param array $data
     * @return JsonResponse
     */
    function redirect($controller, $action, $params)
    {
        return RedirectResponse::createMG($controller, $action, $params);
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\redirectByUrl'))
{

    /**
     * @param array $data
     * @return JsonResponse
     */
    function redirectByUrl($url, $params)
    {
        return RedirectResponse::createByUrl($url, $params);
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\t'))
{

    /**
     * @param array $data
     * @return JsonResponse
     */
    function t(array $data = [])
    {
        return Lang::getInstance(ModuleConstants::getLangsDir());
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\errorLog'))
{

    function errorLog($message = "", $request = [], $response = [], $vars = [], $beforeVars = [], $level = Entity::LEVEL_HIGHT, $reference = [])
    {
        $entitylogger = sl('entityLogger');
        $entitylogger
                ->setMessage($message)
                ->setLevel($level)
                ->setType(Entity::TYPE_ERROR)
                ->setReference(Entity::convertToId($reference), Entity::convertToClassName($reference))
                ->setRequest($request)
                ->setResponse($response)
                ->setBeforeVars($beforeVars)
                ->setVars($vars);
        return $entitylogger->save();
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\successLog'))
{

    function successLog($message = "", $request = [], $response = [], $vars = [], $beforeVars = [], $level = Entity::LEVEL_LOW, $reference = [])
    {
        $entitylogger = sl('entityLogger');
        $entitylogger
                ->setMessage($message)
                ->setLevel($level)
                ->setType(Entity::TYPE_SUCCESS)
                ->setReference(Entity::convertToId($reference), Entity::convertToClassName($reference))
                ->setRequest($request)
                ->setResponse($response)
                ->setBeforeVars($beforeVars)
                ->setVars($vars);
        return $entitylogger->save();
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\infoLog'))
{

    function infoLog($message = "", $request = [], $response = [], $vars = [], $beforeVars = [], $level = Entity::LEVEL_LOW, $reference = [])
    {
        $entitylogger = sl('entityLogger');
        $entitylogger
                ->setMessage($message)
                ->setLevel($level)
                ->setType(Entity::TYPE_INFO)
                ->setReference(Entity::convertToId($reference), Entity::convertToClassName($reference))
                ->setRequest($request)
                ->setResponse($response)
                ->setBeforeVars($beforeVars)
                ->setVars($vars);
        return $entitylogger->save();
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\criticalLog'))
{

    function criticalLog($message = "", $request = [], $response = [], $vars = [], $beforeVars = [], $level = Entity::LEVEL_LOW, $reference = [])
    {
        $entitylogger = sl('entityLogger');
        $entitylogger
                ->setMessage($message)
                ->setLevel($level)
                ->setType(Entity::TYPE_CRITICAL)
                ->setReference(Entity::convertToId($reference), Entity::convertToClassName($reference))
                ->setRequest($request)
                ->setResponse($response)
                ->setBeforeVars($beforeVars)
                ->setVars($vars);
        return $entitylogger->save();
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\debugLog'))
{

    function debugLog($message = "", $request = [], $response = [], $vars = [], $beforeVars = [], $level = Entity::LEVEL_LOW, $reference = [])
    {
        $entitylogger = sl('entityLogger');
        $entitylogger
                ->setMessage($message)
                ->setLevel($level)
                ->setType(Entity::TYPE_DEBUG)
                ->setReference(Entity::convertToId($reference), Entity::convertToClassName($reference))
                ->setRequest($request)
                ->setResponse($response)
                ->setBeforeVars($beforeVars)
                ->setVars($vars);
        return $entitylogger->save();
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\sl'))
{

    /**
     * @param string $class
     * @param string|null $method
     * @return object
     */
    function sl($class, $method = null)
    {

        $return = null;

        if ($class != null && $method == null)
        {
            $return = ServiceLocator::call($class);
        }
        elseif ($class != null && $method != null)
        {
            $return = ServiceLocator::call($class, $method);
        }
        return $return;
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\di'))
{

    /**
     * @param string|null $class
     * @param string|null $method
     * @param bool $isCreate
     * @return type
     */
    function di($class, $method = null, $isCreate = true)
    {
        $return     = null;
        $methodName = ($isCreate) ? 'create' : 'get';

        if ($class != null && $method == null)
        {
            $return = DependencyInjection::{$methodName}($class);
        }
        elseif ($class != null && $method != null)
        {
            $return = DependencyInjection::{$methodName}($class, $method);
        }

        return $return;
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\isAdmin'))
{

    /**
     * @return bool
     */
    function isAdmin()
    {
        $request = sl('request');
        $server  = $request->server->all();
        $session = $request->getSession();
        if (isset($session['adminid']) && isset($server['REQUEST_URI']) && strpos($server['REQUEST_URI'], '/' . getAdminDirName() . '/') !== false
        )
        {
            return true;
        }

        return false;
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\getAdminDirName'))
{

    /**
     * @return string
     */
    function getAdminDirName()
    {
        $fileName = 'configuration.php';
        $filePath = ModuleConstants::getFullPathWhmcs();

        if (file_exists($filePath . DIRECTORY_SEPARATOR . $fileName))
        {
            include $filePath . DIRECTORY_SEPARATOR . $fileName;
        }

        if ($customadminpath && is_string($customadminpath))
        {
            return $customadminpath;
        }

        return 'admin';
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\getModuleName'))
{

    /**
     * @return string
     */
    function getModuleName()
    {
        $request = sl('request');

        if (isAdmin())
        {
            $data = $request->get('module', $request->query->get('module', 'VpsServer'));
            return isset($data) ? $data : '';
        }

        $data = $request->get('m', $request->query->get('m', 'VpsServer'));
        return isset($data) ? $data : '';
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\view'))
{

    /**
     * main View Controler
     * 
     * @return \ModulesGarden\Servers\VpsServer\Core\UI\View
     */
    function view($template = null)
    {
        $request = sl('request');

        if ($request->get('ajax') && $request->get('namespace') != null && $request->get('namespace') != '' && $request->get('namespace') != 'undefined')
        {
            $view      = sl('viewAjax');
            $namespace = $request->get('namespace');
            $view->initAjaxElementContext($namespace);

            return $view;
        }

        $view = sl('view');

        if ($template)
        {
            $view->setTemplate($template);
        }

        return $view;
    }
}

if (!function_exists('\ModulesGarden\Servers\VpsServer\Core\Helper\convertStringToNamespace'))
{

    function convertStringToNamespace($string)
    {
        return str_replace("_", "\\", $string);
    }
}
