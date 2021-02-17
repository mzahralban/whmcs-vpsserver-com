<?php

namespace ModulesGarden\Servers\VpsServer\Core\Models;

use \Illuminate\Database\Eloquent\model as EloquentModel;
use \ModulesGarden\Servers\VpsServer\Core\ModuleConstants;

/**
 * Wrapper for EloquentModel
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
class ExtendedEloquentModel extends EloquentModel
{
    public function __construct(array $attributes = [])
    {
        $this->table = ModuleConstants::getPrefixDataBase() . $this->table;
        
        parent::__construct($attributes);
    }
}
