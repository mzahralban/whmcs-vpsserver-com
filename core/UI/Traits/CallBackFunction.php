<?php

namespace ModulesGarden\Servers\VpsServer\Core\UI\Traits;

use \ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\BaseValidatorInterface;
use \ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Validators as FieldsValidators;

/**
 * Fields related functions
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
trait CallBackFunction
{
   protected $callBackFunction = null;
   
   public function getCallBackFunction()
   {
       return $this->callBackFunction;
   }
   
   public function setCallBackFunction($callBackFunction = null)
   {
       $this->callBackFunction = $callBackFunction;
       
       return $this;
   }
}
