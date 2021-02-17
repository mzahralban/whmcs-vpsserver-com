<?php

namespace ModulesGarden\Servers\VpsServer\Core\UI\Widget\DataTable\DataProviders;

use \ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\DataSetInterface;

class DataSet implements DataSetInterface
{
    public $offset         = 0;
    public $fullDataLenght = 0;
    public $records        = [];
    public $additionalData = [];    

    public function getOffset()
    {
        return $this->offset;
    }

    public function getRecords()
    {
        return $this->records;
    }

    public function getLenght()
    {
        return count($this->records);
    }

    public function getFullLenght()
    {
        return $this->fullDataLenght;
    }
    
    public function getAdditionalData()
    {
        return $this->additionalData;
    }
    
    public function setAdditionalData($data)
    {
        $this->additionalData = $data;
        
        return $this;
    }      
}
