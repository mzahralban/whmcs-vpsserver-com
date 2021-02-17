<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\ChangeHostname\Helpers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Models\Images\Criteria;
use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;

class ChangeHostnameManager
{

    protected $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function read($id)
    {
        $api = new Api($this->params);
        if (empty($api->getClient()->getServerID())) {
            throw new \Exception(Lang::getInstance()->absoluteT('vmIsEmpty'));
        }
        $entity = $api->changeHostname()->get($id);
        if($entity->createdFrom->id != $api->getClient()->getServerID()){
            throw new \Exception(Lang::getInstance()->absoluteT('accessDenied'));
        }
        return $entity;
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
        return $enteries  = $api->changeHostname()
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
