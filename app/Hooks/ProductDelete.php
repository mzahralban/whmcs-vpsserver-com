<?php


$hookManager->register(
    function ($args) {
        if (\ModulesGarden\Servers\VpsServer\Core\Models\Whmcs\Product::where('id', $args['pid'])->first()->servertype == "VpsServer")
        {
            $productProvider = new \ModulesGarden\Servers\VpsServer\App\Helpers\FieldsProvider($args['pid']);
            $productProvider->removeAll();
        }
        }
    );
