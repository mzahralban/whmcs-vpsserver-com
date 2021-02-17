<?php

namespace ModulesGarden\Servers\VpsServer\App\Helpers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\Core\Models\Whmcs\Hosting;

class ServiceManager {

    protected $params;
    protected $vm;

    public function __construct($params = []) {
        if (empty($params)) {
            $params = $this->getWHMCSParams();
        }
        $this->params = $params;
    }

    private function getWHMCSParams() {
        $server = new \WHMCS\Module\Server();
        $server->loadByServiceID($this->getHostingID());
        return $server->buildParams();
    }

    private function getHostingID() {
        if (!empty($_REQUEST['productselect'])) {
            return $_REQUEST['productselect'];
        }
        elseif (!empty($_REQUEST['id'])) {
            return $_REQUEST['id'];
        }
        else {
            return $this->getIDFromDB();
        }
    }

    private function getIDFromDB() {
        $hosting = Hosting::where([
                    'userid' => $_REQUEST['userid']
                ])->orderBy('domain', 'ASC')->first();
        return $hosting->id;
    }

    protected function initVM() {
        $this->api = new Api($this->params);
    }

    public function reboot() {
        $serverId = CustomFields::get($this->params['serviceid'], 'serverID');
        $this->api = new Api($this->params);
        $this->api->serverReboot($serverId);
    }

    public function powerOn() {
        $serverId = CustomFields::get($this->params['serviceid'], 'serverID');
        $this->api = new Api($this->params);
        $this->api->serverPowerOn($serverId);
    }

    public function powerOff() {
        $serverId = CustomFields::get($this->params['serviceid'], 'serverID');
        $this->api = new Api($this->params);
        $this->api->serverPowerOff($serverId);
    }

    public function rebootInRecoveryMode() {
        $serverId = CustomFields::get($this->params['serviceid'], 'serverID');
        $this->api = new Api($this->params);
        $this->api->serverRebootInRecoveryMode($serverId);
    }

    function getVM() {
        $this->initVM();
        return $this->vm;
    }
    function passwordReset(){
        $this->api = new Api($this->params);
        $password = $this->vm->resetRootPassword();
        $this->updatePasswordInDB($this->params['serviceid'], $password->getResponse()['root_password']);
        return;
    }

    private function updatePasswordInDB($hostingID, $password)
    {
        Hosting::where('id', $hostingID)
            ->update([
                'password' => \encrypt($password)
            ]);
    }

    function getParams() {
        return $this->params;
    }

}
