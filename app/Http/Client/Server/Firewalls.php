<?php


namespace ModulesGarden\Servers\VpsServer\App\Http\Client\Server;

use Exception;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Pages\FirewallsInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Rebuild\Pages\ConsolePage;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Pages\FirewallsPage;
use ModulesGarden\Servers\VpsServer\Core\Helper;
use ModulesGarden\Servers\VpsServer\Core\Http\AbstractController;

class Firewalls extends AbstractController
{
    public function index()
    {
        try
        {
            return Helper\view()->addElement(FirewallsInformation::class)->addElement(FirewallsPage::class);
        }
        catch (Exception $ex)
        {

        }
    }

}