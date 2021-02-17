<?php
namespace ModulesGarden\Servers\VpsServer\App\UI\Backups\Forms;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\Core\UI\Interfaces\ClientArea;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\BaseForm;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\Fields\Select;
use ModulesGarden\Servers\VpsServer\Core\UI\Widget\Forms\FormConstants;
use ModulesGarden\Servers\VpsServer\App\UI\Backups\Providers\AddBackupDataProvider;

/**
 *
 * Created by PhpStorm.
 * User: Tomasz Bielecki ( tomasz.bi@modulesgarden.com )
 * Date: 10.09.19
 * Time: 13:06
 * Class AddAccountForm
 */
class AddBackupForm extends BaseForm implements ClientArea
{
    protected $id               = 'addBackupForm';
    protected $name             = 'addBackupForm';
    protected $title            = 'addBackupForm';

    public function initContent()
    {
        $this->setFormType(FormConstants::CREATE);
        $this->setProvider(new AddBackupDataProvider());
        $this->initFields();
        $this->loadDataToForm();
    }

    public function initFields()
    {
        $params = Params::moduleParams($_REQUEST['id']);
        $api = new Api($params);
        $disks = $api->listServerDisks(CustomFields::get($params['serviceid'], 'serverID'));

        foreach($disks as $disk)
        {
            if($disk->is_primary)
            {
                $data[$disk->id] = $disk->label.' ('.$disk->size.' GB - primary)';
            } else {
                $data[$disk->id] = $disk->label.' ('.$disk->size.' GB)';
            }
        }
        $field = new Select('disks');
        $field->setAvalibleValues($data);
        $this->addField($field);
    }
}
