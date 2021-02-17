<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Pages;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\Column;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Buttons\AddSshKeyButton;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Buttons\DeleteSshKeyButton;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Buttons\EditSshKeyButton;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Buttons\ShowSshKeyButton;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataTable;
use ModulesGarden\Servers\VpsServer\App\UI\SshKeys\Helpers\SshKeysManager;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataProviders\Providers\ArrayDataProvider;

class SshKeysPage extends DataTable implements ClientArea, AdminArea
{

    protected $id    = 'sshKeysTable';
    protected $name  = 'sshKeysTable';
    protected $title = 'sshKeysTable';

    public function loadHtml()
    {
        $this->addColumn((new Column('created'))->setOrderable('DESC')->setSearchable(true, Column::TYPE_DATE));
        $this->addColumn((new Column('modified'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('label'))->setOrderable()->setSearchable(true));
    }

    public function initContent()
    {
        $this->addButton(new AddSshKeyButton());
        $this->addActionButton(new ShowSshKeyButton());
        $this->addActionButton(new EditSshKeyButton());
        $this->addActionButton(new DeleteSshKeyButton());
    }

    protected function loadData()
    {

        $params = Params::moduleParams($_REQUEST['id']);
        $api = new Api($params);
        $keys = $api->listServerSshKeys(CustomFields::get($params['serviceid'], 'serverID'));
        $data = [];

        foreach ($keys as &$key){
         
            $data[] = [
                'id' =>   $key->id,
                'modified' =>   date("Y-m-d H:i:s",  strtotime($key->modified)),
                'created' =>   date("Y-m-d H:i:s",  strtotime($key->created)),
                'label' =>   $key->label,
                'key' =>   $key->key
            ];
        }
        $dataProvider = new ArrayDataProvider();
        $dataProvider->setDefaultSorting('created', 'desc');
        $dataProvider->setData($data);

        $this->setDataProvider($dataProvider);
        
    }

}
