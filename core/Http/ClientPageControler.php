<?php

namespace ModulesGarden\Servers\VpsServer\Core\Http;

use \ModulesGarden\Servers\VpsServer\Core\Helper;
use function \ModulesGarden\Servers\VpsServer\Core\Helper\sl;

/**
 * Description of ClientPageControler
 *
 * @author INBSX-37H
 */
class ClientPageControler
{

    protected $params = null;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function loadPage()
    {
        try
        {

            $ret = sl("clientController")->setParams($this->params)->execute();
            return $ret;
        }
        catch (Exception $exc)
        {
            die(var_dump($exc));
        }
    }

}
