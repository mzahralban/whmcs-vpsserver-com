<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Pages;

use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons\AddFirewallButton;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons\ApplyFirewallRuleButton;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons\MoveRuleDownButton;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons\MoveRuleUpButton;
use ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Helpers\FirewallsManager;
use ModulesGarden\Servers\VpsServer\Core\ModuleConstants;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\Column;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataProviders\Providers\ArrayDataProvider;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataTable;

class FirewallsPage extends DataTable implements ClientArea, AdminArea
{

    protected $id    = 'firewallsTable';
    protected $name  = 'firewallsTable';
    protected $title = 'firewallsTable';

    public function loadHtml()
    {
        $this->addColumn((new Column('command'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('address'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('port'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('interface'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('protocol'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('applied'))->setOrderable()->setSearchable(true));

    }

    public function initContent()
    {
        $this->mainContainer->setScriptHtml(file_get_contents(ModuleConstants::getFullPath('app', 'UI', 'Firewalls', 'Templates', 'assets', 'js', 'index.js')));
        $this->addButton(new AddFirewallButton());
        $this->addButton(new ApplyFirewallRuleButton());
        $this->addActionButton(new MoveRuleUpButton());
        $this->addActionButton(new MoveRuleDownButton());
//        $this->mainContainer->setScriptHtml(file_get_contents(ModuleConstants::getFullPath('app', 'UI', 'Backups', 'Templates', 'assets', 'js', 'index.js')));
        $this->addActionButton(new \ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons\DeleteFirewallButton());
//        $this->addActionButton(new \ModulesGarden\Servers\VpsServer\App\UI\Firewalls\Buttons\RestoreButton());

    }

    public function replaceFieldApplied($key, $row)
    {
       if($row[$key] == false){
           return 'No';
       } else {
           return 'Yes';
       }
    }

    public function replaceFieldPort($key, $row)
    {
       if (empty($row[$key])) {
           return 'Any';
       }
       return $row[$key];
    }

    protected function loadData()
    {
        $dataManger   = new FirewallsManager($this->whmcsParams);
        $dataProvider = new ArrayDataProvider();
        $data=[];
        $current =  $dataManger->getCurrent();
        foreach ($current as $firewall){
            $data[]=[
                'id' => $firewall->id,
                'command' =>   $firewall->command,
                'address' =>   $firewall->address,
                'port' =>   $firewall->port,
                'interface' =>   $firewall->network_interface->id,
                'protocol' =>   $firewall->protocol,
                'applied' =>  $firewall->applied,
                'state' =>  $firewall->state
            ];
        }
        $dataProvider->setDefaultSorting('interface', 'desc');
        $dataProvider->setData($data);

        $this->setDataProvider($dataProvider);
        
    }

}
