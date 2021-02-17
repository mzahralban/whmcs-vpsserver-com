<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Configuration\Helpers;

use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Models\Images\Criteria;
use ModulesGarden\Servers\VpsServer\Core\Models\Whmcs\Product;
use ModulesGarden\Servers\VpsServer\Core\Models\Whmcs\ServersRelations;

class Config
{

    protected static $serverPassword;

    public static function getProductValues()
    {
        return Product::where('id', $_REQUEST['id'])->first();
    }

    private static function setServerDetails()
    {
        if (!empty($_REQUEST['servergroup']))
        {
            $serverGroupID = $_REQUEST['servergroup'];
        }
        else
        {
            $serverGroupID = self::getProductValues()->servergroup;
        }


        $server                                 = ServersRelations::where('groupid', $serverGroupID)->with('servers')->first();
        self::$serverPassword['serverpassword'] = \decrypt($server->servers->password);
    }

    /**
     * @return array
     */
    public static function getLocations()
    {
        self::setServerDetails();//api key z pola password idzie

        $api     = new Api(self::$serverPassword);//dziala tak ze API ma podklasy, lokacje w jednej, serwery w drugiej//czyli location() to magiczna przenoszaca do innej klasy

        $locations = $api->listLocations();

        return $locations;
    }

    public static function getTemplates()
    {
        self::setServerDetails();//api key z pola password idzie

        $api     = new Api(self::$serverPassword);//dziala tak ze API ma podklasy, lokacje w jednej, serwery w drugiej//czyli location() to magiczna przenoszaca do innej klasy

        $templates = $api->listTemplates();

        return $templates;
    }

    public static function getProducts()
    {
        self::setServerDetails();//api key z pola password idzie

        $api     = new Api(self::$serverPassword);//dziala tak ze API ma podklasy, lokacje w jednej, serwery w drugiej//czyli location() to magiczna przenoszaca do innej klasy

        $products = $api->listProducts();

        return $products;
    }

    /**
     * @param array $list
     * @param $id
     * @param $value
     * @return array
     */
    protected static function prepareList($list = [], $id, $value)
    {
        $itemList = [];

        foreach($list as $location)
        {
            $itemList[$location->{$id}] = $location->{$value};
        }

        return $itemList;
    }

}
