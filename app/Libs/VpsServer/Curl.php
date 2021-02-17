<?php 


namespace ModulesGarden\Servers\VpsServer\App\Libs\VpsServer;

class Curl
{
    public $curl;
    public $lastInfo;
    public $lastRequest;
    public $lastRequestHeaders;
    public $lastResponse;
    public $lastResponseHeaders;
    public $options = [
        CURLOPT_HEADER => true,
        CURLINFO_HEADER_OUT => true,
        CURLOPT_RETURNTRANSFER => true,
    ];

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    public function reset()
    {
        curl_reset($this->curl);
        curl_setopt_array($this->curl, $this->options);

        $this->lastInfo = null;
        $this->lastRequest = null;
        $this->lastRequestHeaders = null;
        $this->lastResponse = null;
        $this->lastResponseHeaders = null;
    }

    public function setBasicAuth($username, $password)
    {
        $this->options[CURLOPT_USERPWD] = urlencode($username).':'.urlencode($password);
    }

    public function exec($url,$content,$method = 'GET', $headers = [])
    {
        $this->reset();

        if(is_array($content))
        {
            $content = http_build_query($content);
        }

        if($method == 'GET')
        {
            $url.="?".$content;
        }
        else
        {
            curl_setopt($this->curl, CURLOPT_POSTFIELDS,$content);
            $this->lastRequest = $content;
        }

        if(!empty($headers))
        {
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);

        $response = curl_exec($this->curl);

        $curl_info = curl_getinfo($this->curl);

        $this->lastInfo = $curl_info;

        if(!empty($curl_info['request_header']))
        {
            $this->lastRequestHeaders = $curl_info['request_header'];
        }

        if (curl_error($this->curl))
        {
            throw new \Exception("Connection Error ".curl_errno($this->curl).": ".curl_error($this->curl));
        }

        $this->lastResponseHeaders = substr($response, 0, $curl_info['header_size']);
        $this->lastResponse = substr($response, $curl_info['header_size']);
        
        if(curl_getinfo($this->curl, CURLINFO_HTTP_CODE) == 204 && $this->lastResponse == null){
            $this->lastResponse = json_encode(['result' => true]);
            return $this->lastResponse;
        }

        return $this->lastResponse;

    }
}