<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Helpers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Models\Images\Criteria;
use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;

class BackupsManager
{

    protected $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function read($id)
    {

    }

    public function create($description){

    }

    public function get()
    {
        $api      = new Api($this->params);
        if(empty($api->getClient()->getServerID()))
        {
            throw new \Exception(Lang::getInstance()->absoluteT('vmIsEmpty'));
        }
        return $enteries  = $api->backups()
            ->findByServerId($api->getClient()->getServerID())
            ->fetch();
    }

    public function restore($id)
    {
        $this->read($id);
        $entery = new Image($id);
        $entery->name = $id;
        $api = new Api($this->params);
        if (empty($api->getClient()->getServerID())) {
            throw new \Exception(Lang::getInstance()->absoluteT('vmIsEmpty'));
        }
        return $api->servers()->get($api->getClient()->getServerID())->rebuildFromImage($entery);
    }


    public function getCurrent()
    {
        $api = new Api($this->params);
        if (empty($api->getClient()->getServerID())) {
            throw new \Exception(Lang::getInstance()->absoluteT('vmIsEmpty'));
        }
        return $api->servers()->get($api->getClient()->getServerID())->image;
    }

    public function delete($id){

    }
}
