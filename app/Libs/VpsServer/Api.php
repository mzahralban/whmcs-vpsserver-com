<?php

namespace ModulesGarden\Servers\VpsServer\App\Libs\VpsServer;

use Guzzle\Http\Exception\RequestException;


class Api
{
    protected $params;

    protected $curl;

    protected $client;

    public function __construct($params)
    {
        $this->baseUrl = "https://api.vpsserver.com/v1";
        $this->apiToken = $params['serverpassword'];
        $this->name = $params['serverusername'];
        $this->headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->apiToken
        ];
        $this->params = $params;
        $this->createCurl();

    }

    protected function createCurl()
    {
        $this->curl = new Curl();
    }

    public function testConnection()
    {
        $method = 'GET';
        $endpoint = '/user.json';

        $this->curl->exec($this->baseUrl . $endpoint, '', $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);

        $successCodes = [200,201,204];
        if(!in_array($this->curl->lastInfo['http_code'],$successCodes)){

            return ['error' => $this->curl->lastResponse];
        }
        return ['success' => true];
    }

    public function createServer($content)
    {
        $method = 'POST';
        $endpoint = '/servers/create.json';

        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode($content), $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
        $result = json_decode($result);

        return $result;

    }

    public function serverPowerOn($id)
    {
        $method = 'POST';
        $endpoint = '/servers/'.$id.'/power-on.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function serverPowerOff($id)
    {
        $method = 'POST';
        $endpoint = '/servers/'.$id.'/power-off.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function serverReboot($id)
    {
        $method = 'POST';
        $endpoint = '/servers/'.$id.'/reboot.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function serverRebootInRecoveryMode($id)
    {
        $method = 'POST';
        $endpoint = '/servers/'.$id.'/reboot-in-recovery.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function serverResetRootPassword($id,$password)
    {
        $method = 'PUT';
        $endpoint = '/servers/'.$id.'/reset-root-password.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode(["password" => $password]), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function serverChangeHostname($id,$hostname)
    {
        $method = 'PUT';
        $endpoint = '/servers/'.$id.'/change-hostname.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode(["hostname" => $hostname]), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function serverResize($id,$product)
    {
        $method = 'PUT';
        $endpoint = '/servers/'.$id.'/resize.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode(["product" => $product]), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function serverDelete($id)
    {
        $method = 'DELETE';
        $endpoint = '/servers/'.$id.'/delete.json';

        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function listLocations()
    {
        $method = 'GET';
        $endpoint = '/locations.json';

        $locations = $this->curl->exec($this->baseUrl . $endpoint, '', $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
        $locations = json_decode($locations);

        $result = [];
        foreach ($locations->locations as $location){
            $result[$location->identifier] = $location->name;
        }

        return $result;
    }

    public function listTemplates()
    {
        $method = 'GET';
        $endpoint = '/templates.json';

        $templates = $this->curl->exec($this->baseUrl . $endpoint, '', $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
        $templates = json_decode($templates);

        $result = [];
        foreach ($templates->templates as $template){
            $result[$template->system_name] = $template->name;
        }

        $limit = 100;

        while(!empty($templates->links->pages->next) && $limit>0)
        {
            $url = $templates->links->pages->next;

            $templates = $this->curl->exec($url, '', $method,$this->headers);
            logModuleCall('VpsServer - ' . $url, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
            $templates = json_decode($templates);

            foreach ($templates->templates as $template){
                $result[$template->system_name] = $template->name;
            }
            $limit--;
        }

        return $result;
    }

    public function listProducts()
    {
        $method = 'GET';
        $endpoint = '/products.json';

        $products = $this->curl->exec($this->baseUrl . $endpoint, '', $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
        $products = json_decode($products);

        $result = [];
        foreach ($products->products as $product){
            $result[$product->identifier] = $product->name;
        }

        return $result;
    }

    public function getServerDetails($id)
    {

        $method = 'GET';
        $endpoint = '/servers/' . $id . '.json';

        $details = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $details = json_decode($details);

        return $details->server;
    }

    public function getServerStatisticsPerHour($id)
    {
        $method = 'GET';
        $endpoint = '/servers/' . $id . '/statistics/per-hour.json';

        $statistics = $this->curl->exec($this->baseUrl . $endpoint, '', $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
        $statistics = json_decode($statistics);

        return $statistics->statistics;
    }

    public function getServerStatisticsPerDay($id)
    {
        $method = 'GET';
        $endpoint = '/servers/' . $id . '/statistics/per-day.json';

        $statistics = $this->curl->exec($this->baseUrl . $endpoint, '', $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
        $statistics = json_decode($statistics);

        return $statistics->statistics;
    }

    public function getServerStatisticsPerWeek($id)
    {
        $method = 'GET';
        $endpoint = '/servers/' . $id . '/statistics/per-week.json';

        $statistics = $this->curl->exec($this->baseUrl . $endpoint, '', $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
        $statistics = json_decode($statistics);

        return $statistics->statistics;
    }

    public function listServerDisks($serverId)
    {
        $method = 'GET';
        $endpoint = '/servers/' . $serverId . '/disks.json';

        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method,$this->headers);
        logModuleCall('VpsServer - ' . $this->baseUrl . $endpoint, __FUNCTION__, $this->curl->lastRequestHeaders."\n".$this->curl->lastRequest, $this->curl->lastResponseHeaders."\n".$this->curl->lastResponse,$this->curl->lastResponseHeaders."\n".$this->curl->lastResponse);
        $result = json_decode($result);

        return $result->disks;
    }

    public function createFirewallRule($id,$content)
    {

        $method = 'POST';
        $endpoint = '/servers/'.$id.'/firewall/add.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode($content), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result->firewall_rule;
    }

    public function firewallMoveUp($serverId,$ruleId)
    {
        $method = 'GET';
        $endpoint = '/servers/'.$serverId.'/firewall/'.$ruleId.'/move-up.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function firewallMoveDown($serverId,$ruleId)
    {
        $method = 'GET';
        $endpoint = '/servers/'.$serverId.'/firewall/'.$ruleId.'/move-down.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function firewallDelete($serverId,$ruleId)
    {
        $method = 'DELETE';
        $endpoint = '/servers/'.$serverId.'/firewall/'.$ruleId.'/delete.json';

        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function listFirewalls($serverId)
    {
        $method = 'GET';
        $endpoint = '/servers/'.$serverId.'/firewall.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result->firewall_rules;
    }

    public function serverFirewallApply($serverId)
    {

        $method = 'POST';
        $endpoint = '/servers/'.$serverId.'/firewall/apply.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function serverFirewallDefault($serverId)
    {

        $method = 'POST';
        $endpoint = '/servers/'.$serverId.'/firewall/default.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function createSshKey($serverId, $content)
    {

        $method = 'POST';
        $endpoint = '/ssh-keys/add.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode($content), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result->ssh_key;
    }


    public function applySshKey($serverId, $content)
    {

        $method = 'POST';
        $endpoint = '/servers/'.$serverId.'/ssh-keys/apply.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode($content), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function sshKeyUpdate($keyId,$content)
    {
        $method = 'PUT';
        $endpoint = '/ssh-keys/'.$keyId.'/edit.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode($content), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result->ssh_key;
    }

    public function sshKeyDelete($keyId)
    {
        $method = 'DELETE';
        $endpoint = '/ssh-keys/'.$keyId.'/delete.json';

        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function listSshKeys($serverId)
    {
        $method = 'GET';
        $endpoint = '/servers/'.$serverId.'/ssh-keys.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result->ssh_keys;
    }

    public function listServerSshKeys($serverId)
    {

        $method = 'GET';
        $endpoint = '/servers/'.$serverId.'/ssh-keys.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);
        return $result->ssh_keys;
    }

    public function serverSshKeyApply($serverId)
    {

        $method = 'POST';
        $endpoint = '/servers/'.$serverId.'/ssh-keys/apply.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function createBackup($serverId,$content)
    {

        $method = 'POST';
        $endpoint = '/servers/'.$serverId.'/backups/add.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode($content), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function backupDelete($serverId,$backupId)
    {
        $method = 'DELETE';
        $endpoint = '/servers/'.$serverId.'/backups/'.$backupId.'/delete.json';

        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function listBackups($serverId)
    {
        $method = 'GET';
        $endpoint = '/servers/'.$serverId.'/backups.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result->backups;
    }

    public function backupRestore($serverId,$backupId)
    {
        $method = 'PUT';
        $endpoint = '/servers/'.$serverId.'/backups/'.$backupId.'/restore.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function createBackupSchedule($serverId,$content)
    {

        $method = 'POST';
        $endpoint = '/servers/'.$serverId.'/backup-schedules/add.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode($content), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function backupScheduleDelete($serverId,$backupScheduleId)
    {
        $method = 'DELETE';
        $endpoint = '/servers/'.$serverId.'/backup-schedules/'.$backupScheduleId.'/delete.json';

        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function listBackupsSchedules($serverId)
    {
        $method = 'GET';
        $endpoint = '/servers/'.$serverId.'/backup-schedules.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result->backup_schedules;
    }

    public function backupScheduleUpdate($serverId,$backupScheduleId,$content)
    {
        $method = 'PUT';
        $endpoint = '/servers/'.$serverId.'/backup-schedules/'.$backupScheduleId.'/edit.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, json_encode($content), $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result;
    }

    public function listNetworkInterfaces($serverId)
    {
        $method = 'GET';
        $endpoint = '/servers/'.$serverId.'/network-interfaces.json';
        $result = $this->curl->exec($this->baseUrl . $endpoint, '', $method, $this->headers);
        logModuleCall(
            'VpsServer - ' . $this->baseUrl . $endpoint,
            __FUNCTION__,
            $this->curl->lastRequestHeaders . "\n" . $this->curl->lastRequest,
            $this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse,$this->curl->lastResponseHeaders . "\n" . $this->curl->lastResponse
        );
        $result = json_decode($result);

        return $result->network_interfaces;
    }

}