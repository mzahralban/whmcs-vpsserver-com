<?php

use ModulesGarden\Servers\VpsServer\App\Helpers;
use ModulesGarden\Servers\VpsServer\App\Libs\Metrics\MyMetricsProvider;
use \ModulesGarden\Servers\VpsServer\App\Models\Accounts;

if (!defined('DS'))
{
    define('DS', DIRECTORY_SEPARATOR);
}
require_once "core" . DS . "Bootstrap.php";

if (!defined("WHMCS"))
{
    die("This file cannot be accessed directly");
}

function VpsServer_MetaData()
{
    return array(
        'DisplayName'    => 'VPS Server',
        'RequiresServer' => true,
        'ListAccountsUniqueIdentifierDisplayName' => 'Domain',
        'ListAccountsUniqueIdentifierField' => 'domain',

        'ListAccountsProductField' => 'configoption1',
    );
}

function VpsServer_ConfigOptions($params)
{
    try{

        if ($_REQUEST['action'] === 'module-settings' && !$_REQUEST['loadData'])
        {
            $configOption = new Helpers\ConfigOptions();

            if (empty($_REQUEST['magic']))
            {
                return [
                    "configoption" => [
                        "Type" => "",
                        "Description" => $configOption->getJsCode(),
                    ],
                ];
            }

            $outputBuffering = \ob_get_contents();
            if($outputBuffering !== FALSE)
            {
                if(!empty($outputBuffering))
                {
                    \ob_clean();
                }
                else
                {
                    \ob_start();
                }
            }

            return $configOption->getConfig();
        }
        elseif ($_REQUEST['loadData'] && $_REQUEST['ajax'] == '1')
        {
            #MGLICENSE_CHECK_THROW_EXCEPTION#
            $configOption = new Helpers\ConfigOptions();
            return $configOption->getConfig();
        }
    }
    catch (\Exception $exc)
    {
        echo json_encode(['content' => $exc->getMessage()]);
        die();
        return [
            [
                "error" => "Error",
                "Type"         => "",
                "Description"  => $exc->getMessage()
            ]
        ];
    }
}

function VpsServer_TestConnection(array $params)
{
    try
    {
        $connectionTester = new Helpers\TestConnection($params);
        $result = $connectionTester->testConnection();
        return $result;
    }
    catch (\Exception $exc)
    {
        return ['error' => $exc->getMessage()];
    }
}

function VpsServer_CreateAccount(array $params)
{
    $action = new Helpers\AccountActions($params);
    return $action->create();
}

function VpsServer_SuspendAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#
    $action = new Helpers\AccountActions($params);
    return $action->suspendAccount();
}

function VpsServer_UnsuspendAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#
    $action = new Helpers\AccountActions($params);
    return $action->unsuspendAccount();
}

function VpsServer_TerminateAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#
    $action = new Helpers\AccountActions($params);
    return $action->terminateAccount();
}


function VpsServer_ChangePackage(array $params)
{
    #MGLICENSE_CHECK_RETURN#
    $action = new Helpers\AccountActions($params);
    return $action->changePackage();
}

function VpsServer_ClientArea($params)
{

    if($params['status'] !== "Active")
    {
        return;
    }
    try
    {
        $serviceManager = new \ModulesGarden\Servers\VpsServer\App\Helpers\ServiceManager($params);
        $serviceManager->getVM();
        if (class_exists('\ModulesGarden\Servers\VpsServer\Core\Http\ClientPageControler'))
        {
            $pageControler = new \ModulesGarden\Servers\VpsServer\Core\Http\ClientPageControler($params);
            $resault       = $pageControler->loadPage();
        }
        return $resault;
    }
    catch (\Exception $exc)
    {
        $exceptionToken = md5(time());
        logModuleCall('VpsServer - ' . $exceptionToken, __FUNCTION__, ['error' => $exc->getMessage(), 'trace' => $exc->getTraceAsString()], $params);

        return [
            'tabOverviewReplacementTemplate' => 'templates/client/errors/error.tpl',
            'templateVariables'              => ['errorMessage' => $exc->getMessage()]
        ];
    }
}

function VpsServer_ChangePassword(array $params)
{
    #MGLICENSE_CHECK_RETURN#
    $action = new Helpers\AccountActions($params);
    return $action->changePassword();
}

function VpsServer_AdminServicesTabFields($params)
{
    $_SESSION['serviceid'] = $params['serviceid'];
    try
    {
        $serviceManager = new \ModulesGarden\Servers\VpsServer\App\Helpers\ServiceManager($params);
        $serviceManager->getVM();
         return ['' => \ModulesGarden\Servers\VpsServer\Core\Helper\sl('adminProductPage')->setParams($params)->execute()];
    }
    catch (Exception $ex)
    {

    }
}
