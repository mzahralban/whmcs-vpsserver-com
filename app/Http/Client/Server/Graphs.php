<?php


namespace ModulesGarden\Servers\VpsServer\App\Http\Client\Server;

use Exception;
use ModulesGarden\Servers\VpsServer\App\UI\Graphs\Pages\GraphsInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Graphs\Pages\GraphsPage;
use ModulesGarden\Servers\VpsServer\Core\Helper;
use ModulesGarden\Servers\VpsServer\Core\Http\AbstractController;

class Graphs extends AbstractController
{
    public function index()
    {
        try
        {
            return Helper\view()->addElement(GraphsInformation::class)->addElement(GraphsPage::class);
        }
        catch (Exception $ex)
        {

        }
    }

}