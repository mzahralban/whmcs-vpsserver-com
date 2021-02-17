<?php


namespace ModulesGarden\Servers\VpsServer\App\Http\Client\Server;

use Exception;
use ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Pages\ChangeHostnameInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Rebuild\Pages\ConsolePage;
use ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Pages\ChangeHostnamePage;
use ModulesGarden\Servers\VpsServer\Core\Helper;
use ModulesGarden\Servers\VpsServer\Core\Http\AbstractController;

class ChangeHostname extends AbstractController
{
    public function index()
    {
        try
        {
            return Helper\view()->addElement(ChangeHostnameInformation::class)->addElement(ChangeHostnamePage::class);
        }
        catch (Exception $ex)
        {

        }
    }

}