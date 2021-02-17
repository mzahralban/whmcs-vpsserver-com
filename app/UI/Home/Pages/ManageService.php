<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Pages;

use ModulesGarden\Servers\VpsServer\App\Helpers\PageController;
use ModulesGarden\Servers\VpsServer\Core\Helper\BuildUrl;
use ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use const DS;
use function ModulesGarden\Servers\VpsServer\Core\Helper\sl;

class ManageService extends BaseContainer implements ClientArea, AdminArea {

    public function getAssetsUrl() {
        return BuildUrl::getAssetsURL();
    }

    public function getPages() {
        $pages = new PageController($this->whmcsParams);
        return $pages->getPages();
    }

    public function getURL($controller) {
        $params          = sl('request')->query->all();
        $params['modop'] = 'custom';
        $params['a']     = 'management';
        $params['mg-page']     = $controller;

        return 'clientarea.php?' . http_build_query($params);
    }

    public function getImageUrl($controller) {

        $file = $this->getAssetsUrl() . DS . 'img' . DS . 'servers' . DS . strtolower($controller) . '.png';
        if (file_exists($file)) {
            return $file;
        }
    }

}
