<?php

use \ModulesGarden\Servers\VpsServer\Core\ModuleConstants;
use \ModulesGarden\Servers\VpsServer\Core\ServiceLocator;
use \ModulesGarden\Servers\VpsServer\Core\FileReader\Validator;
use \ModulesGarden\Servers\VpsServer\Core\FileReader\File;
use \ModulesGarden\Servers\VpsServer\Core\DependencyInjection\Builder;
use ModulesGarden\Servers\VpsServer\Core\DependencyInjection\Services;

if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
if (!defined('PS')) define('PS', PATH_SEPARATOR);
if (!defined('CRLF')) define('CRLF', "\r\n");

require_once dirname(__DIR__) . DS . "vendor" . DS . "autoload.php";


/**
 * Initialize base values
 */
ModuleConstants::initialize();

/**
 * Initailize DI builder
 */
new Builder();

/**
 * Initialize Services
 */
new Services();

/**
 * Check file permission
 */
if (is_dir(ModuleConstants::getFullPath('storage')) === false
    || is_writable(ModuleConstants::getFullPath('storage')) === false
    || is_writable(ModuleConstants::getFullPath('storage', 'app')) === false
    || is_writable(ModuleConstants::getFullPath('storage', 'crons')) === false
    || is_writable(ModuleConstants::getFullPath('storage', 'logs')) === false)
{
    File::createPaths(
        ['full' => ModuleConstants::getFullPath('storage'),              'permission' => 0777],
        ['full' => ModuleConstants::getFullPath('storage', 'app'),       'permission' => 0777],
        ['full' => ModuleConstants::getFullPath('storage', 'crons'),     'permission' => 0777],
        ['full' => ModuleConstants::getFullPath('storage', 'logs'),      'permission' => 0777]
    );
}

if (Validator::getInstance()->validateFile(ModuleConstants::getFullPath('storage', 'logs')) === false)
{
    ServiceLocator::call('errorManager')->addError(
        'Bootstrap',
        PHP_EOL . ServiceLocator::call('lang')->absoluteT('permissionsStorage'),
        ['path' => ModuleConstants::getFullPath('storage')]
    );
}
