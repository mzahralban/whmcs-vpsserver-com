<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Pages;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\Column;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataTable;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons\AddBackupButton;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons\EditBackupButton;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons\DeleteBackupButton;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataProviders\Providers\ArrayDataProvider;

class BackupsPage extends DataTable implements ClientArea, AdminArea
{

    protected $id    = 'backupsTable';
    protected $name  = 'backupsTable';
    protected $title = 'backupsTable';

    public function loadHtml()
    {
        $this->addColumn((new Column('created'))->setOrderable('DESC')->setSearchable(true, Column::TYPE_DATE));
        $this->addColumn((new Column('built_at'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('disk'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('size'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('built'))->setOrderable()->setSearchable(true));
    }

    public function initContent()
    {
        $this->addButton(new AddBackupButton());
        $this->addActionButton(new \ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons\RestoreButton());
        $this->addActionButton(new DeleteBackupButton());
    }

    public function replaceFieldBuilt($key, $row)
    {
        if($row[$key] == 'false'){
            return 'Built';
        } else {
            return 'In progress';
        }
    }

    protected function loadData()
    {

        $params = Params::moduleParams($_REQUEST['id']);
        $api = new Api($params);
        $backups = $api->listBackups(CustomFields::get($params['serviceid'], 'serverID'));

        $data = [];

        foreach ($backups as &$backup){
            $created = $backup->created;
            if(empty($created))
            {
                $created = '';
            } else {
                $created = date("Y-m-d H:i:s",  strtotime($created));
            }
            $data[] = [
                'id' =>   $backup->id,
                'built_at' =>   empty($backup->built_at)? '' : date("Y-m-d H:i:s",  strtotime($backup->built_at)),
                'created' =>   $created,
                'size' =>   round($backup->size/1024/1024, 2).' GB',
                'built' =>   $backup->built,
                'disk' => $backup->disk->label
            ];
        }
        $dataProvider = new ArrayDataProvider();
        $dataProvider->setDefaultSorting('created', 'desc');
        $dataProvider->setData($data);

        $this->setDataProvider($dataProvider);
        
    }

}
