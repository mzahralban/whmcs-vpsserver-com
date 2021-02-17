<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Pages;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\Column;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataTable;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons\AddBackupScheduleButton;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons\EditBackupScheduleButton;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Buttons\DeleteBackupScheduleButton;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataProviders\Providers\ArrayDataProvider;

class BackupsSchedulePage extends DataTable implements ClientArea, AdminArea
{

    protected $id    = 'backupsSchedulePage';
    protected $name  = 'backupsSchedulePage';
    protected $title = 'backupsSchedulePage';

    public function loadHtml()
    {
        $this->addColumn((new Column('disk'))->setOrderable('DESC')->setSearchable(true, Column::TYPE_DATE));
        $this->addColumn((new Column('duration'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('period'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('rotation_period'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('status'))->setOrderable()->setSearchable(true));
        $this->addColumn((new Column('start_time'))->setOrderable()->setSearchable(true));
    }

    public function initContent()
    {
        $this->addButton(new AddBackupScheduleButton());
        $this->addActionButton(new EditBackupScheduleButton());
        $this->addActionButton(new DeleteBackupScheduleButton());
    }

    public function replaceFieldStatus($key, $row)
    {
        return ucfirst($row[$key]);
    }

    public function replaceFieldPeriod($key, $row)
    {
        return ucfirst($row[$key]);
    }


    protected function loadData()
    {
        $params = Params::moduleParams($_REQUEST['id']);
        $api = new Api($params);
        $backups = $api->listBackupsSchedules(CustomFields::get($params['serviceid'], 'serverID'));
        $data = [];

        foreach ($backups as &$backup){
         
            $data[] = [
                'id' =>   $backup->id,
                'start_time' =>   date("Y-m-d H:i:s",  strtotime($backup->start_time)),
                'created' =>   date("Y-m-d H:i:s",  strtotime($backup->created)),
                'rotation_period' =>   $backup->rotation_period,
                'duration' => $backup->duration,
                'status' => $backup->status,
                'period' => $backup->period,
                'disk' => $backup->disk->label
            ];
        }
        $dataProvider = new ArrayDataProvider();
        $dataProvider->setDefaultSorting('created', 'desc');
        $dataProvider->setData($data);

        $this->setDataProvider($dataProvider);
    }

}
