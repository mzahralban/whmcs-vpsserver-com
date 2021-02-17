<?php


namespace ModulesGarden\Servers\VpsServer\App\Http\Client\Server;

use Exception;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Pages\SshKeysInformation;
use ModulesGarden\Servers\VpsServer\App\UI\Rebuild\Pages\ConsolePage;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Pages\SshKeysPage;
use ModulesGarden\Servers\VpsServer\Core\Helper;
use ModulesGarden\Servers\VpsServer\Core\Http\AbstractController;

class SshKeys extends AbstractController
{
    public function index()
    {
        try
        {
            /**
             * Removed on client request
             * will be added to one of the next version
             * 
             * return Helper\view()->addElement(SshKeysInformation::class)->addElement(SshKeysPage::class);
             */
            
        }
        catch (Exception $ex)
        {

        }
    }

}