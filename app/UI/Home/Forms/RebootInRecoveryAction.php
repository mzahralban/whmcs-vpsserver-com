<?php

namespace ModulesGarden\Servers\VpsServer\App\UI\Home\Forms;

use ModulesGarden\Servers\VpsServer\App\UI\Home\Providers\rebootInRecoveryMode;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\AdminArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;

/**
 * Description of RebuildVM
 *
 * @author Mateusz Pawłowski <mateusz.pa@modulesgarden.com>
 */
class rebootInRecoveryModeAction extends BaseForm implements ClientArea, AdminArea
{

    protected $id    = 'rebootInRecoveryModeActionForm';
    protected $name  = 'rebootInRecoveryModeActionForm';
    protected $title = 'rebootInRecoveryModeActionForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::UPDATE);
        $this->setProvider(new rebootInRecoveryMode());
        $this->setConfirmMessage('confirmrebootInRecoveryMode');
        $this->loadDataToForm();
    }

}
