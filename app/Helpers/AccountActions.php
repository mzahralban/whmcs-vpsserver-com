<?php

namespace ModulesGarden\Servers\VpsServer\App\Helpers;

use Exception;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Logger;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Models\Droplets\Create;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Models\Projects\Resources;
use ModulesGarden\Servers\VpsServer\App\Models\CronTasks;
use ModulesGarden\Servers\VpsServer\App\Service\CronTask\RegisterTask;
use ModulesGarden\Servers\VpsServer\App\Traits\ParamsComponent;
use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;

class AccountActions
{

    use ParamsComponent;

    private $api;

    /*
     * Set Params
     * 
     * @param arrya $paramns
     * @return void;
     */

    public function __construct($params)
    {
        $this->setParams($params);
    }

    private function checkServerIDIsEmpty()
    {
        if (!empty($this->params['customfields']['serverID'])) {
            throw new Exception(Lang::getInstance()->T('serverIsNotEmpty'));
        }
    }

    private function genRandomHostname($product)
    {
        $templateName = $this->params['configoptions']['template'] ? $this->params['configoptions']['template'] : $product->getField('template');
        $partOfString = substr($templateName, 0, 5);
        return str_replace(' ', '', $partOfString.'-'.$this->params['serviceid']);
    }

    public function create()
    {
        try{
            $this->checkServerIDIsEmpty();
            $this->api = new Api($this->params);
            $product = new FieldsProvider($this->params['packageid']);
            if(empty($this->params['domain'])){
                $this->params['domain'] = $this->genRandomHostname($product);
            }
            $content = [
                "template" => $this->params['configoptions']['template'] ? $this->params['configoptions']['template'] : $product->getField('template'),
                "hostname" => $this->params['domain'],
                "location" => $this->params['configoptions']['location'] ? $this->params['configoptions']['location'] : $product->getField('location'),
                "product" => $this->params['configoptions']['product'] ? $this->params['configoptions']['product'] : $product->getField('product'),
            ];

            $result = $this->api->createServer($content);

            $newServerId = $result->server->id;
            if(empty($newServerId))
            {
                if(!empty($result->messages))
                {
                    $errorMessage = '';
                    foreach ((array)$result->messages as $messageClass){
                        foreach ($messageClass as $message){
                            $errorMessage.=$message.". ";
                        }
                    }
                    throw new Exception($errorMessage);
                }
                elseif(!empty($result->message))
                {
                    throw new Exception($result->message);
                }
                else{
                    throw new Exception("Can't create server, please check module logs.");
                }
            }

            CustomFields::set($this->params['serviceid'], 'serverID', $newServerId);
        
        }catch ( Exception $ex){
            return $ex->getMessage();
        }
        return 'success';
    }

    public function suspendAccount()
    {

        try{
            $serverId = CustomFields::get($this->params['serviceid'], 'serverID');

            $this->api = new Api($this->params);
            $result = $this->api->serverPowerOff($serverId);

            if($result->result !== true){throw new Exception($result->message);}

        }catch ( Exception $ex){
            return $ex->getMessage();
        }
        return 'success';
    }

    public function terminateAccount()
    {

        try{
            $serverId = CustomFields::get($this->params['serviceid'], 'serverID');

            $this->api = new Api($this->params);
            $result = $this->api->serverDelete($serverId);

            if($result->result !== true){throw new Exception($result->message);}

            CustomFields::set($this->params['serviceid'], 'serverID', "");
        }catch ( Exception $ex){
            return $ex->getMessage();
        }
        return 'success';
    }

    public function unsuspendAccount()
    {

        try{
            $serverId = CustomFields::get($this->params['serviceid'], 'serverID');

            $this->api = new Api($this->params);
            $result = $this->api->serverPowerOn($serverId);

            if($result->result !== true){throw new Exception($result->message);}

        }catch ( Exception $ex){
            return $ex->getMessage();
        }
        return 'success';

    }


    public function changePackage()
    {

        try{
            $serverId = CustomFields::get($this->params['serviceid'], 'serverID');

            $product = new FieldsProvider($this->params['packageid']);
            $serverProduct = $product->getField('product');

            $this->api = new Api($this->params);
            $result = $this->api->serverResize($serverId,$serverProduct);

            if($result->result !== true){throw new Exception($result->message);}

        }catch ( Exception $ex){
            return $ex->getMessage();
        }
        return 'success';
    }

    public function changePassword()
    {
        try{

            $serverId = CustomFields::get($this->params['serviceid'], 'serverID');

            $this->api = new Api($this->params);
            $result = $this->api->serverResetRootPassword($serverId, $this->params['password']);
            if($result->result !== true){throw new Exception($result->message);}

        }catch ( Exception $ex){
            return $ex->getMessage();
        }
        return 'success';
    }
}


