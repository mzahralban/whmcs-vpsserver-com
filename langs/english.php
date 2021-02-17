<?php

// ---------------------------------------------------- BASIC  ---------------------------------------------------------

$_LANG['noDataAvalible']                                      = 'No Data Available';
$_LANG['searchPlacecholder']                                  = 'Search...';
$_LANG['changesHasBeenSaved']                                 = 'Changes have been saved successfully';
$_LANG['actionCannotBeFound']                                 = 'The action cannot be found';
$_LANG['addonCA']['pageNotFound']                             = 'Page not found';
$_LANG['FormValidators']['thisFieldCannotBeEmpty']            = 'This field cannot be empty';
$_LANG['FormValidators']['PleaseProvideANumericValueBetween'] = 'Please provide a number between 0 and 999';
$_LANG['FormValidators']['invalidDomain']                     = 'The domain is invalid';
$_LANG['FormValidators']['invalidIPv6']                       = 'The IP address is invalid';
$_LANG['token']                                               = 'Token';
$_LANG['emptyServerGroup']                                    = "You first need to select a server group from the dropdown menu.";
$_LANG['serverIsNotEmpty']                                    = "The server ID field is not empty";
$_LANG['serverMustOff']                                       = "If you want to change the type of server, your server must be off.";
$_LANG['downgradeError']                                      = "You cannot downgrade the type of your server.";
$_LANG['auto']                                                = "Auto";




// ---------------------------------------------------- Module Configuration  ---------------------------------------------------------

$_LANG['serverAA']['productPage']['inactiveServerAccess'] = 'The server you are trying to access is currently inactive.';
$_LANG['serverAA']['productPage']['buildingServerAccess'] = 'The process of VM creation is in progress. Please try again later.';
$_LANG['serverAA']['productPage']['pendingServerAccess'] = 'The server you are trying to access is still building. Please try again later.';

$_LANG['serverAA']['productPage']['connectionProblem'] = "Server connection problem. Please check the configuration and try again.";
$_LANG['serverAA']['productPage']['configurationForm']  = "Configuration";
$_LANG['serverAA']['productPage']['mainContainer']['configurationForm']['configFields']['leftSection']['packageconfigoption[template]']['packageconfigoption[template]'] = 'Template';
$_LANG['serverAA']['productPage']['mainContainer']['configurationForm']['configFields']['leftSection']['packageconfigoption[location]']['packageconfigoption[location]'] = 'Location';
$_LANG['serverAA']['productPage']['mainContainer']['configurationForm']['configFields']['rightSection']['packageconfigoption[product]']['packageconfigoption[product]']  = 'Product';

$_LANG['serverAA']['productPage']['mainContainer']['configurationForm']['configFields']['leftSection']['packageconfigoption[location]']['locationDescription']     = 'Choose a preferred location from the list.';
$_LANG['serverAA']['productPage']['mainContainer']['configurationForm']['configFields']['leftSection']['packageconfigoption[template]']['templateDescription']   = 'Select an template of the system that will be installed on the server.';
$_LANG['serverAA']['productPage']['mainContainer']['configurationForm']['configFields']['rightSection']['packageconfigoption[product]']['productDescription']     = 'Choose a product type from the available that will be used on the server.';

$_LANG['auto']     = "Auto";

$_LANG['serverAA']['productPage']['configurableOptions']                                                       = 'Configurable Options';
$_LANG['serverAA']['productPage']['mainContainer']['configurableOptions']['button']['createCOBaseModalButton'] = 'Create Configurable Options';
$_LANG['serverAA']['productPage']['createCOConfirmModal']['modal']['createCOConfirmModal'] = 'Create Configurable Options ';
$_LANG['serverAA']['productPage']['createCOConfirmModal']['baseAcceptButton']['title']     = 'Confirm';
$_LANG['serverAA']['productPage']['createCOConfirmModal']['baseCancelButton']['title']     = 'Cancel';

$_LANG['configurableOptionsCreate']                           = "Configurable options have been created successfully";
$_LANG['configurableOptionsUpdate']                           = "Configurable options have been updated successfully";
$_LANG['serverAA']['productPage']['configurableOptionExists'] = "Configurable options already exist";

$_LANG['serverAA']['productPage']['mainContainer']['configurableOptions']['doNotUse'] = 'Do not use';

$_LANG['cannotCreateKey']           = "Cannot create the new SSH Key, probably the key with the same name already exists. Please change the hostname and try again.";

$_LANG['serverAA']['productPage']['mainContainer']['dataTable']['serverinformationTable']  = "Server Information";

$_LANG['serverAA']['productPage']['mainContainer']['dataTable']['table']['name'] = 'Server Information';

$_LANG['serverAA']['productPage']['no']     = "No";
$_LANG['serverAA']['productPage']['yes']    = "Yes";


// ---------------------------------------------------- Client Area  ---------------------------------------------------------
$_LANG['serverCA']['home']['manageHeader']          = "Service Actions";
$_LANG['serverCA']['home']['pagesHeader']           = "Service Management";
$_LANG['serverCA']['iconTitle']['firewalls']        = "Firewalls";
$_LANG['serverCA']['iconTitle']['graphs']           = "Graphs";
$_LANG['serverCA']['iconTitle']['sshKeys']          = "SSH Keys";
$_LANG['serverCA']['iconTitle']['changeHostname']   = "Change Hostname";
$_LANG['serverCA']['iconTitle']['backups']          = "Back-Ups";

$_LANG['wrongConfirmText']              = "Wrong confirmation text";
$_LANG['powerOnStarted']                = "The virtual machine has been powered on successfully";
$_LANG['powerOffStarted']               = "The virtual machine has been powered off successfully";
$_LANG['rebootStarted']                 = "The virtual machine has been rebooted successfully";
$_LANG['rebootInRecoveryModeStarted']   = "The virtual machine has been rebooted in recovery mode successfully";

// ---------------------------------------------------- Menu ---------------------------------------------------------
$_LANG['serverCA']['sidebarMenu']['mg-provisioning-module'] = "Manage Server";
$_LANG['serverCA']['sidebarMenu']['changeHostname']         = "Change Hostname";
$_LANG['serverCA']['sidebarMenu']['firewalls']              = "Firewalls";
$_LANG['serverCA']['sidebarMenu']['backups']                = "Back-Ups";
$_LANG['serverCA']['sidebarMenu']['sshKeys']                = "SSH Keys";
$_LANG['serverCA']['sidebarMenu']['graphs']                 = "Graphs";


// ---------------------------------------------------- Service Information  ---------------------------------------------------------
$_LANG['serverCA']['home']['mainContainer']['dataTable']['serverinformationTable'] = "Server Information";

$_LANG['serviceInformation']['tableField']['status']         = "Status";
$_LANG['serviceInformation']['tableField']['hostname']       = "Hostname";
$_LANG['serviceInformation']['tableField']['password']       = "Password";
$_LANG['serviceInformation']['tableField']['memory']         = "Memory";
$_LANG['serviceInformation']['tableField']['disk']           = "Disk Size";
$_LANG['serviceInformation']['tableField']['cpu']            = "CPU Number";
$_LANG['serviceInformation']['tableField']['template']       = "Template";
$_LANG['serviceInformation']['tableField']['product']        = "Product";
$_LANG['serviceInformation']['tableField']['location']       = "Location";
$_LANG['serviceInformation']['tableField']['ip']             = 'IP Address';
$_LANG['serviceInformation']['tableField']['username']       = 'Username';

$_LANG['serverCA']['home']['no'] = "No";
$_LANG['serverCA']['home']['no'] = "Yes";

// ---------------------------------------------------- Service Actions  ---------------------------------------------------------
$_LANG['buttons']['actions']['powerOnButton']                   = 'Power On Machine';
$_LANG['buttons']['actions']['powerOffButton']                  = 'Power Off Machine';
$_LANG['buttons']['actions']['rebootButton']                    = 'Reboot Machine';
$_LANG['buttons']['actions']['rebootInRecoveryModeButton']      = 'Reboot Machine In Recovery Mod';

$_LANG['serverCA']['home']['powerOnConfirmModal']['modal']['powerOnConfirmModal']         = 'Power On Virtual Machine';
$_LANG['serverCA']['home']['powerOnConfirmModal']['powerOnActionForm']['confirmPowerOn']  = 'Are you sure that you want to power on this virtual machine?';
$_LANG['serverCA']['home']['powerOnConfirmModal']['baseAcceptButton']['title']            = 'Power On';
$_LANG['serverCA']['home']['powerOnConfirmModal']['baseCancelButton']['title']            = 'Cancel';


$_LANG['serverCA']['home']['powerOffConfirmModal']['modal']['powerOffConfirmModal']         = 'Power Off Virtual Machine';
$_LANG['serverCA']['home']['powerOffConfirmModal']['powerOffActionForm']['confirmPowerOff'] = 'Are you sure that you want to power off this virtual machine?';
$_LANG['serverCA']['home']['powerOffConfirmModal']['baseAcceptButton']['title']             = 'Power Off';
$_LANG['serverCA']['home']['powerOffConfirmModal']['baseCancelButton']['title']             = 'Cancel';


$_LANG['serverCA']['home']['rebootConfirmModal']['modal']['rebootConfirmModal']        = 'Reboot Virtual Machine';
$_LANG['serverCA']['home']['rebootConfirmModal']['rebootActionForm']['confirmReboot'] = 'Are you sure that you want to reboot this virtual machine?';
$_LANG['serverCA']['home']['rebootConfirmModal']['baseAcceptButton']['title']          = 'Reboot';
$_LANG['serverCA']['home']['rebootConfirmModal']['baseCancelButton']['title']          = 'Cancel';


$_LANG['serverCA']['home']['rebootInRecoveryModeConfirmModal']['modal']['rebootInRecoveryModeConfirmModal']          = 'Reboot Virtual Machine In Recovery Mode';
$_LANG['serverCA']['home']['rebootInRecoveryModeConfirmModal']['rebootInRecoveryModeActionForm']['confirmRebootInRecoveryMode'] = 'Are you sure that you want to reboot this virtual machine in recovery mode?';
$_LANG['serverCA']['home']['rebootInRecoveryModeConfirmModal']['baseAcceptButton']['title']              = 'Reboot In Recovery Mode';
$_LANG['serverCA']['home']['rebootInRecoveryModeConfirmModal']['baseCancelButton']['title']              = 'Cancel';


$_LANG['serverCA']['iconTitle']['powerOnButton']       = "Power On";
$_LANG['serverCA']['iconTitle']['powerOffButton']      = "Power Off";
$_LANG['serverCA']['iconTitle']['rebootButton']        = "Reboot";
$_LANG['serverCA']['iconTitle']['rebootInRecoveryModeButton']      = "Reboot In Recovery Mode";


// ---------------------------------------------------- Change Hostname ---------------------------------------------------------

$_LANG['serverCA']['changeHostname']['changeHostname'] = 'Hostname Change';
$_LANG['errorChangeHostname']          = 'Hostname cannot be changed, please try again later.';


//-------------------------------------------------- Client Area Backups -------------------------------------------------------------

$_LANG['errorBackupAdd']          = 'Backup cannot be created, please try again later.';
$_LANG['successBackupAdd']          = 'The process of creating a backup has been started. It may take a while.';

$_LANG['errorBackupScheduleAdd']          = 'Backup schedule cannot be created, please try again later.';
$_LANG['successBackupSchedulAdd']          = 'Backup Schedule added successfully.';

$_LANG['errorBackupIsRestoring']          = 'The selected backup is restoring, please try again later.';

$_LANG['errorBackupDelete']          = 'Backup cannot be deleted, please try again later.';
$_LANG['successBackupDelete']          = 'The process of deleting a backup has been started. It may take a while.';

$_LANG['errorBackupScheduleDelete']          = 'Backup schedule cannot be deleted, please try again later.';
$_LANG['successBackupScheduleDelete']          = 'Backup schedule deleted successfully.';

$_LANG['errorBackupScheduleAdd']          = 'Backup schedule cannot be added, please try again later.';
$_LANG['successBackupScheduleAdd']          = 'Backup schedule added successfully.';

$_LANG['errorBackupScheduleEdit']          = 'Backup schedule cannot be saved, please try again later.';
$_LANG['successBackupScheduleEdit']          = 'Backup schedule saved successfully.';


$_LANG['restoreBackup']                  = 'The process of restoring backup  :description: has been started successfully. It may take a few minutes.';
$_LANG['errorBackupIsRestoring']         = "You cannot restore the backup while another one is being restored. The server is locked.";
$_LANG['errorBackupIsCreating']          = 'The selected backup is being created, please try again later.';

$_LANG['serverCA']['backups']['addBackupModal']['modal']['addBackupModal']  = 'Add Backup';
$_LANG['serverCA']['backups']['addBackupModal']['addBackupForm']['disks']['disks'] = 'Disk';

$_LANG['serverCA']['backups']['addBackupModal']['baseAcceptButton']['title'] = 'Confirm';

$_LANG['serverCA']['backups']['addBackupModal']['baseCancelButton']['title'] = ' Cancel';


$_LANG['serverCA']['backups']['editBackupSModal']['modal']['editBackupSModal'] = 'Edit Backup Schedule';
$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['duration']['duration'] = 'Duration';
$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['period']['period'] = 'Period';
$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['rotation_period']['rotation_period'] = 'Rotation Period';
$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['leftSection']['year'] = 'Year';
$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['leftSection']['month'] = 'Month';
$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['leftSection']['days'] = 'Days';
$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['rightSection']['hour'] = 'Hour';
$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['rightSection']['minutes'] = 'Minutes';
$_LANG['serverCA']['backups']['editBackupSModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['backups']['editBackupSModal']['baseCancelButton']['title'] = 'Cancel';


$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['addBackupButton']['button']['addBackupButton'] = 'Add Backup';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['backupsSchedulePage'] = 'Backups Schedule Configuration';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['table']['created'] = 'Created';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['table']['start_time'] = 'Start Time';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['table']['status'] = 'Status';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['table']['period'] = 'Period';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['table']['rotation_period'] = 'Rotation Period';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['table']['duration'] = 'Duration';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['addBackupScheduleButton']['button']['addBackupScheduleButton'] = 'Add Backup Schedule';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['deleteBackupSButton']['button']['deleteBackupSButton'] = 'Delete Backup Schedule';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['editBackupSButton']['button']['editBackupSButton'] = 'Edit Backup Schedule';
$_LANG['serverCA']['backups']['backups'] = 'Backups Management';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['backupsTable']  = 'Backups Configuration';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['table']['created'] = 'Created';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['table']['built_at'] = 'Done';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['table']['disk'] = 'Disk Label';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['table']['size'] = 'Size';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['table']['built'] = 'built';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['table']['locked'] = 'locked';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['deleteBackupButton']['button']['deleteBackupButton'] = 'Delete Backup';
$_LANG['serverCA']['backups']['mainContainer']['backupsTable']['restoreButton']['button']['restoreButton'] = 'Restore Backup';


$_LANG['serverCA']['backups']['addBackupScheduleModal']['modal']['addBackupScheduleModal']  = 'Add Backup Schedule';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['disks']['disks'] = 'Disk';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['duration']['duration'] = 'Duration';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['period']['period'] = 'Period';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['rotation_period']['rotation_period'] = 'Rotation Period';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['baseCancelButton']['title'] = 'Cancel';

$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['leftSection']['year'] = 'Year';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['leftSection']['month']  = 'Month';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['rightSection']['hour']   = 'Hour';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['rightSection']['minutes'] = 'Minutes';
$_LANG['serverCA']['backups']['addBackupScheduleModal']['addBackupSForm']['leftSection']['days'] = 'Day';


$_LANG['serverCA']['backups']['restoreModal']['modal']['restoreModal'] = 'Restore Backup';
$_LANG['serverCA']['backups']['restoreModal']['restoreForm']['restoreConfirm'] = 'Are you sure that you want to restore the :description: backup? All previous data on the disk will be lost';
$_LANG['serverCA']['backups']['restoreModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['backups']['restoreModal']['baseCancelButton']['title'] = 'Cancel';

$_LANG['serverCA']['backups']['deleteBackupSModal']['modal']['deleteBackupSModal'] = 'Delete Backup Schedule';
$_LANG['serverCA']['backups']['deleteBackupSModal']['deleteBackupSForm']['confirmRemoveAccount'] = 'Are you sure that you want to delete this backup schedule?';

$_LANG['serverCA']['backups']['deleteBackupSModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['backups']['deleteBackupSModal']['baseCancelButton']['title'] = 'Cancel';

$_LANG['serverCA']['backups']['deleteBackupModal']['modal']['deleteBackupModal'] = 'Delete Backup';
$_LANG['serverCA']['backups']['deleteBackupModal']['deleteBackupForm']['confirmRemoveAccount'] = 'Are you sure that you want to delete this backup?';
$_LANG['serverCA']['backups']['deleteBackupModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['backups']['deleteBackupModal']['baseCancelButton']['title'] = 'Cancel';


//-------------------------------------------------- Client Area Firewalls --------------------------------------------------------


$_LANG['errorFirewallIsDeleting']          = 'Firewall rule cannot be deleted, please try again later.';
$_LANG['successDeleteFirewall']          = 'Firewall rule will be deleted soon.';

$_LANG['errorCreateFirewall']          = 'Firewall rule cannot be created, please try again later.';
$_LANG['successCreateFirewall']          = 'Firewall rule added successfully.';

$_LANG['errorFirewallMoveDown']          = 'Firewall rule cannot be moved down, please try again later.';
$_LANG['successFirewallMoveDown']          = 'Firewall rule moved down successfully.';

$_LANG['errorFirewallMoveUp']          = 'Firewall rule cannot be moved up, please try again later.';
$_LANG['successFirewallMoveUp']          = 'Firewall rule moved up successfully.';

$_LANG['serverCA']['firewalls']['firewalls'] = 'Firewalls Management';

$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['firewallsTable']     = "Firewalls";
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['table']['command']     = 'COMMAND';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['table']['address']     = 'ADDRESS';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['table']['port']          = 'PORT';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['table']['interface']     = 'INTERFACE';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['table']['protocol']   = 'PROTOCOL';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['table']['applied']     = 'APPLIED';



$_LANG['serverCA']['firewalls']['addFirewallModal']['modal']['addFirewallModal']      = 'Add Firewall Rule';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['addFirewallButton']['button']['addFirewallButton']    = "Add Firewall Rule";
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['applyFirewallRuleButton']['button']['applyFirewallRuleButton']    = "Apply Firewall Rules";
$_LANG['serverCA']['firewalls']['addFirewallModal']['addFirewallForm']['command']['command']  = 'Command';
$_LANG['successCreateFirewall'] = 'Firewall added successfully';
$_LANG['serverCA']['firewalls']['addFirewallModal']['addFirewallForm']['address']['address'] = 'Address';
$_LANG['serverCA']['firewalls']['addFirewallModal']['addFirewallForm']['port']['port'] = 'Port';
$_LANG['serverCA']['firewalls']['addFirewallModal']['addFirewallForm']['protocol']['protocol'] = 'Protocol';
$_LANG['serverCA']['firewalls']['addFirewallModal']['addFirewallForm']['network_interface_id']['network_interface_id'] = 'Network interface';
$_LANG['serverCA']['firewalls']['addFirewallModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['firewalls']['addFirewallModal']['baseCancelButton']['title'] = 'Cancel';
$_LANG['serverCA']['firewalls']['addFirewallModal']['addFirewallForm']['address']['addressDescription'] = 'Enter hyphen-separated IPs to apply the rule to an IP range (e.g. 192.168.1.1-192.168.1.10). Enter the IPs with slash to apply the rule to CIDR (e.g. 192.168.1.1/24) ';
$_LANG['serverCA']['firewalls']['addFirewallModal']['addFirewallForm']['port']['portDescription'] = 'Leave the empty field to apply the rule to all ports. Enter colon-separated ports to apply the rule to a port range (e.g. 1024:1028). Enter comma-separated ports to apply the rule to the list of ports (e.g. 80,443,21) ';

$_LANG['serverCA']['firewalls']['applyFirewallRuleModal']['modal']['applyFirewallRuleModal'] = 'Apply Firewall Rules';
$_LANG['serverCA']['firewalls']['applyFirewallRuleModal']['moveRuleDownForm']['firewallApplyRules'] = 'Are you sure you want to apply all firewall rules?';
$_LANG['serverCA']['firewalls']['applyFirewallRuleModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['firewalls']['applyFirewallRuleModal']['baseCancelButton']['title'] = 'Cancel';

$_LANG['serverCA']['firewalls']['moveRuleUpModal']['modal']['MoveRuleUpModal'] = 'Move Firewall Rule Up';
$_LANG['serverCA']['firewalls']['moveRuleUpModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['firewalls']['moveRuleUpModal']['baseCancelButton']['title'] = 'Cancel';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['moveRuleUpButton']['button']['moveRuleUpButton'] = 'Move Firewall Rule Up';
//$_LANG['successFirewallMoveUp'] = 'Firewall moved up successfully';

$_LANG['serverCA']['firewalls']['deleteFirewallModal']['deleteFirewallForm']['confirmRemoveFirewall']  = 'Are you sure that you want to delete this firewall rule?';
$_LANG['serverCA']['firewalls']['moveRuleDownModal']['modal']['MoveRuleDownModal'] = 'Move Firewall Rule Down';
$_LANG['serverCA']['firewalls']['moveRuleDownModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['firewalls']['moveRuleDownModal']['baseCancelButton']['title'] = 'Cancel';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['moveRuleDownButton']['button']['moveRuleDownButton'] = 'Move Firewall Rule Down';
//$_LANG['successFirewallMoveDown'] = 'Firewall moved down successfully';

$_LANG['serverCA']['firewalls']['deleteFirewallModal']['modal']['deleteFirewallModal'] = 'Delete Firewall Rule';
$_LANG['serverCA']['firewalls']['deleteFirewallModal']['deleteFirewallForm']['confirmRemoveFirewall']  = 'Are you sure that you want to delete this firewall rule?';
$_LANG['serverCA']['firewalls']['deleteFirewallModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['firewalls']['deleteFirewallModal']['baseCancelButton']['title'] = 'Cancel';
$_LANG['serverCA']['firewalls']['mainContainer']['firewallsTable']['deleteFirewallButton']['button']['deleteFirewallButton'] = 'Delete Firewall Rule';
//$_LANG['successDeleteFirewall'] = 'Firewall deleted successfully';

$_LANG['serverCA']['firewalls']['moveRuleUpModal']['moveRuleUpForm']['confirmFirewallUp'] = 'Are you sure that you want to move up this firewall rule?';
$_LANG['serverCA']['firewalls']['moveRuleDownModal']['moveRuleDownForm']['confirmFirewallDown'] = 'Are you sure that you want to move down this firewall rule?';


//-------------------------------------------------- Client Area SSH Keys --------------------------------------------------------


$_LANG['errorSshKeyAdd']          = 'SSH Key cannot be created, please try again later.';
$_LANG['successSshKeyAdd']          = 'SSH Key created successfully.';

$_LANG['errorSshKeyDelete']          = 'SSH Key cannot be deleted, please try again later.';
$_LANG['successSshKeyDelete']          = 'SSH Key deleted successfully.';

$_LANG['errorSshKeyEdit']          = 'SSH Key cannot be edited, please try again later.';
$_LANG['successSshKeyEdit']          = 'SSH Key saved successfully.';


$_LANG['serverCA']['sshKeys']['sshKeys'] = 'SSH Keys Management';

$_LANG['serverCA']['sshKeys']['mainContainer']['sshKeysTable']['addSshKeyButton']['button']['addSshKeyButton'] = 'Add SSH Key';
$_LANG['serverCA']['sshKeys']['mainContainer']['sshKeysTable']['sshKeysTable']   = 'SSH Keys';
$_LANG['serverCA']['sshKeys']['mainContainer']['sshKeysTable']['table']['created']  = 'Created';
$_LANG['serverCA']['sshKeys']['mainContainer']['sshKeysTable']['table']['modified']  = 'Modified';
$_LANG['serverCA']['sshKeys']['mainContainer']['sshKeysTable']['table']['label']  = 'Label';

$_LANG['serverCA']['sshKeys']['addSshKeyModal']['modal']['addSshKeyModal'] = 'Add SSH Key';
$_LANG['serverCA']['sshKeys']['addSshKeyModal']['addSshKeyForm']['label']['label'] = 'Label';
$_LANG['serverCA']['sshKeys']['addSshKeyModal']['addSshKeyForm']['ssh_key']['ssh_key'] = 'SSH Key';
$_LANG['serverCA']['sshKeys']['addSshKeyModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['sshKeys']['addSshKeyModal']['baseCancelButton']['title'] = 'Cancel';

$_LANG['serverCA']['sshKeys']['showSshKeyModal']['modal']['showSshKeyModal'] = 'Show SSH Key';
$_LANG['serverCA']['sshKeys']['mainContainer']['sshKeysTable']['showSshKeyButton']['button']['showSshKeyButton'] = 'Show SSH Key';
$_LANG['serverCA']['sshKeys']['showSshKeyModal']['showSshKeyForm']['ssh_key']['ssh_key'] = 'SSH Key';

$_LANG['serverCA']['sshKeys']['mainContainer']['sshKeysTable']['editSshKeyModal']['button']['editSshKeyModal'] = 'Edit SSH Key';
$_LANG['serverCA']['sshKeys']['editSshKeyModal']['modal']['editSshKeyModal'] = 'Edit SSH Key';
$_LANG['serverCA']['sshKeys']['editSshKeyModal']['editSshKeyForm']['label']['label'] = 'Label';
$_LANG['serverCA']['sshKeys']['editSshKeyModal']['editSshKeyForm']['ssh_key']['ssh_key'] = 'SSH Key';
$_LANG['serverCA']['sshKeys']['editSshKeyModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['sshKeys']['editSshKeyModal']['baseCancelButton']['title'] = 'Cancel';


$_LANG['serverCA']['sshKeys']['mainContainer']['sshKeysTable']['deleteSshKeyModal']['button']['deleteSshKeyModal'] = 'Delete SSH Key';
$_LANG['serverCA']['sshKeys']['deleteSshKeyModal']['modal']['deleteSshKeyModal'] = 'Delete SSH Key';
$_LANG['serverCA']['sshKeys']['deleteSshKeyModal']['deleteSshKeyForm']['confirmRemoveAccount'] = 'Are you sure that you want to delete this SSH key?';
$_LANG['serverCA']['sshKeys']['deleteSshKeyModal']['baseAcceptButton']['title'] = 'Confirm';
$_LANG['serverCA']['sshKeys']['deleteSshKeyModal']['baseCancelButton']['title'] = 'Cancel';


$_LANG['status']['creating'] = 'Creating';
$_LANG['status']['available'] = 'Available';

$_LANG['serverAA']['productPage']['createCOConfirmModal']['createConfigurableAction']['configurableOptionsNameInfo']  = 'Below you can choose which configurable options will be generated for this product. Please note that these options are divided into two parts separated by a | sign, where the part on the left indicates the sent variable and the part on the right the friendly name displayed to customers. After generating these options you can edit the friendly part on the right, but not the variable part on the left. More information about configurable options and their editing can be found :configurableOptionsNameUrl:.';
$_LANG['serverCA']['backups']['mainContainer']['backupsSchedulePage']['table']['disk'] = 'Disk Label';

$_LANG['serverCA']['sidebarMenu']['passwordRequirementsTitle'] = 'The password should consist of at least:';
$_LANG['serverCA']['sidebarMenu']['passwordRequirements1'] = '12 characters';
$_LANG['serverCA']['sidebarMenu']['passwordRequirements2'] = '1 uppercase & 1 lowercase characte';
$_LANG['serverCA']['sidebarMenu']['passwordRequirements3'] = '1 number';
$_LANG['serverCA']['sidebarMenu']['passwordRequirements4'] = '1 special character';

$_LANG['serverCA']['home']['inactiveServerAccess'] = 'The server you are trying to access is currently inactive.';
$_LANG['serverCA']['home']['buildingServerAccess'] = 'The process of VM creation is in progress. Please try again later.';
$_LANG['serverCA']['home']['pendingServerAccess'] = 'The server you are trying to access is still building. Please try again later.';

$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['hostnameLabel'] = 'Hostname';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['hostnameButton'] = 'Change Hostname';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['processing'] = 'The server you are trying to access is currently inactive.';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['modalConfirmation'] = 'Are you sure you want to change your hostname? This action will reboot your server.';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['changedError'] = 'Hostname cannot be changed.';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['inactiveServerAccess'] = 'The server you are trying to access is currently inactive.';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['hostnameChangeSuccessfully'] = 'Hostname has been changed successfully.';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['baseConfirm'] = 'Confirm';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['baseCancel'] = 'Cancel';
$_LANG['serverCA']['changeHostname']['saveHostnameIncorrect'] = 'Hostname contains incorrect characters.';
$_LANG['serverCA']['changeHostname']['saveHostnameEmpty'] = 'Cannot save empty hostname.';
$_LANG['serverCA']['changeHostname']['changedError'] = 'Hostname cannot be changed.';
$_LANG['serverCA']['changeHostname']['mainContainer']['changeHostnameTable']['backToOverview'] = 'Back To Overview';

$_LANG['serverCA']['backups']['editBackupSModal']['editBackupSForm']['status']['status'] = 'Status';

$_LANG['serverCA']['graphs']['GraphsInformation'] = 'Statistics Graphs';
$_LANG['serverCA']['graphs']['mainContainer']['graphsPage']['period'] = 'Period';
$_LANG['serverCA']['graphs']['mainContainer']['graphsPage']['lastHours'] = 'Last 24 Hours';
$_LANG['serverCA']['graphs']['mainContainer']['graphsPage']['lastWeek'] = 'Last Week';
$_LANG['serverCA']['graphs']['mainContainer']['graphsPage']['lastMonth'] = 'Last Month';


$_LANG['errorFirewallApply'] = 'Firewall rules cannot be applied';
$_LANG['successFirewallApply'] = 'Firewall rules applied successfully';
$_LANG['serverCA']['pageNotFound'] = 'Page not found';