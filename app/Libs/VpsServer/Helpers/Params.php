<?php
namespace ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers;

class Params
{
    public static function moduleParams($hid)
    {
        if(!function_exists("ModuleBuildParams"))
        {
            require_once ROOTDIR.'/includes/modulefunctions.php';
        }
        return ModuleBuildParams($hid);
    }

    public static function parseGB($gb)
    {
        return round($gb / (1024*1024), 4);
    }
}