<?php


namespace ModulesGarden\Servers\VpsServer\App\Http\Client\Server;

use Exception;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Pages\BackupsInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Rebuild\Pages\ConsolePage;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Pages\BackupsPage;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Pages\BackupsSchedulePage;
use ModulesGarden\Servers\VpsServer\Core\Helper;
use ModulesGarden\Servers\VpsServer\Core\Http\AbstractController;

class Backups extends AbstractController
{
    public function index()
    {
        try
        {
            return Helper\view()->addElement(BackupsInformation::class)->addElement(BackupsSchedulePage::class)->addElement(BackupsPage::class);
        }
        catch (Exception $ex)
        {

        }
    }

}