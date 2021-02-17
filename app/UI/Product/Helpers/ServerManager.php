<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Product\Helpers;

use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Base\Items\Droplet;

class ServerManager {

    protected $params = [];
    protected $data   = [];

    public function __construct($params) {
        $this->params = $params;
        if(count($this->params) == 0 && basename($_SERVER['PHP_SELF']) == 'clientsservices.php')
        {
            $this->params = Params::moduleParams($_SESSION['serviceid']);
        }
    }

    public function getInformation() {
//        $vm = $this->getVM();

//        $this->updateDomain($vm->name);
        $this->prepareDateToTable('$vm');
        return $this->data;
    }
    public function getServerStatus()
    {
        $api = new Api($this->params);
        $serverId = CustomFields::get($this->params['serviceid'], 'serverID');
        $details = $api->getServerDetails($serverId);

        return $details->state;
    }
    public function updateDomain($newDomainName) {
        $hosting = \ModulesGarden\Servers\VpsServer\Core\Models\Whmcs\Hosting::where('id', $this->params['serviceid'])->update([
            'domain' => $newDomainName
        ]);
    }

    /*
     * Get VM object
     *
     * @return \ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Base\Items\Droplet $vm
     */

    public function getVM() {
        $api = new Api($this->params);
        return $api->servers()->get($api->getClient()->getServerID());
    }

    /*
     * Get params required to get VM
     * 
     * @return array $params
     */

    private function getParams() {
        return ServiceParams::getParams();
    }

    private function prepareDateToTable($vm) {
        $api = new Api($this->params);
        $serverId = CustomFields::get($this->params['serviceid'], 'serverID');
        $details = $api->getServerDetails($serverId);

        $username = "root";
        if(substr($details->template->system_name, 0, 3) == "win")
        {
            $username = "Administrator";
        }

        foreach($details->ip_addresses as $ips)
        {
            if($ips->type == 'public'){
                $ip = $ips->address;
                break;
            } 
        }
        $this->setRow('status', $details->state);
        $this->setRow('hostname', $details->hostname);
        $this->setRow('ip', $ip);
        $this->setRow('username', $username);
        $this->setRow('password', $this->params['password']);
        $this->setRow('memory', $details->memory . ' GB');
        $this->setRow('disk', $details->disk . ' GB');
        $this->setRow('cpu', $details->cpu);
        $this->setRow('template', $details->template->name);
        $this->setRow('product', $details->product->name);
        $this->setRow('location', $details->location->name);
      
    }

    private function getVolumes($vm) {
        $sizesArray = [];
        foreach ($vm->volumes as $volume) {
            $api = new Api($this->params);

            $sizesArray[] = $api->volumes()->get($volume)->size . " GB";
        }
        return $sizesArray;
    }

    private function setRow($name, $value) {
        $this->data[] = [
            'name'  => Lang::getInstance()->absoluteT('serviceInformation', 'tableField', $name),
            'value' => $value,
            'noLangName' => $name
        ];
    }

    private function renameStatus($status) {
        return ($status) ? Lang::getInstance()->T('yes') : Lang::getInstance()->T('no');
    }

    private function renameBackupValue($value)
    {
        return $value ? 'Enabled' : 'Disabled';
    }


}
