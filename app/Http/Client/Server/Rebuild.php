<?php

namespace ModulesGarden\Servers\VpsServer\App\Http\Client\Server;

use Exception;
use ModulesGarden\Servers\VpsServer\App\UI\Rebuild\Pages\AlertBox;
use ModulesGarden\Servers\VpsServer\App\UI\Rebuild\Pages\ConsolePage;
use ModulesGarden\Servers\VpsServer\App\UI\Rebuild\Pages\RebuildPage;
use ModulesGarden\Servers\VpsServer\Core\Helper;
use ModulesGarden\Servers\VpsServer\Core\Http\AbstractController;

class Rebuild extends AbstractController
{

    public function index()
    {
        try
        {
            $pageController = new \ModulesGarden\Servers\VpsServer\App\Helpers\PageController($this->whmcsParams);

            if (!$pageController->clientAreaRebuild()) {
                return \ModulesGarden\Servers\VpsServer\Core\Helper\redirectByUrl('clientarea.php', [
                    'action' => 'productdetails',
                    'id'     => $this->getRequest()->get('id')
                ]);
            }
            return Helper\view()->addElement(AlertBox::class)->addElement(RebuildPage::class);
        }
        catch (Exception $ex)
        {

        }
    }

}
