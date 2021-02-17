<?php

namespace ModulesGarden\Servers\VpsServer\Core\UI\Widget\Modals;

use \ModulesGarden\Servers\VpsServer\Core\UI\Builder\BaseContainer;

/**
 * base button controller
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
class BaseModal extends BaseContainer
{

    use \ModulesGarden\Servers\VpsServer\Core\UI\Traits\Forms;
    use \ModulesGarden\Servers\VpsServer\Core\UI\Traits\Modal;
    use \ModulesGarden\Servers\VpsServer\Core\UI\Traits\ModalActionButtons;

    protected $id    = 'baseModal';
    protected $name  = 'baseModal';
    protected $title = 'baseModal';
}
