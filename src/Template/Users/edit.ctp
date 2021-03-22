<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dso Masters'), ['controller' => 'DsoMasters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dso Master'), ['controller' => 'DsoMasters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sdo Masters'), ['controller' => 'SdoMasters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sdo Master'), ['controller' => 'SdoMasters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bso Masters'), ['controller' => 'BsoMasters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bso Master'), ['controller' => 'BsoMasters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mo Masters'), ['controller' => 'MoMasters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mo Master'), ['controller' => 'MoMasters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Depot Masters'), ['controller' => 'DepotMasters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Depot Master'), ['controller' => 'DepotMasters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dmsfc Masters'), ['controller' => 'DmsfcMasters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dmsfc Master'), ['controller' => 'DmsfcMasters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Block Cities'), ['controller' => 'BlockCities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block City'), ['controller' => 'BlockCities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub Divisions'), ['controller' => 'SubDivisions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sub Division'), ['controller' => 'SubDivisions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dealer Docs'), ['controller' => 'DealerDocs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dealer Doc'), ['controller' => 'DealerDocs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dso Activity Otps'), ['controller' => 'DsoActivityOtps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dso Activity Otp'), ['controller' => 'DsoActivityOtps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ercms Logs'), ['controller' => 'ErcmsLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ercms Log'), ['controller' => 'ErcmsLogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jsfss Ercms Logs'), ['controller' => 'JsfssErcmsLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Jsfss Ercms Log'), ['controller' => 'JsfssErcmsLogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Logs'), ['controller' => 'Logs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Logs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pmgkay User Log Backups'), ['controller' => 'PmgkayUserLogBackups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pmgkay User Log Backup'), ['controller' => 'PmgkayUserLogBackups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pmgkay User Logs'), ['controller' => 'PmgkayUserLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pmgkay User Log'), ['controller' => 'PmgkayUserLogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Secc Cardholder Pfms'), ['controller' => 'SeccCardholderPfms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Secc Cardholder Pfm'), ['controller' => 'SeccCardholderPfms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Change Logs'), ['controller' => 'UserChangeLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Change Log'), ['controller' => 'UserChangeLogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Logs'), ['controller' => 'UserLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Log'), ['controller' => 'UserLogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Logs Old'), ['controller' => 'UserLogsOld', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Logs Old'), ['controller' => 'UserLogsOld', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Management Logs'), ['controller' => 'UserManagementLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Management Log'), ['controller' => 'UserManagementLogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workflow Check Backups'), ['controller' => 'WorkflowCheckBackups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workflow Check Backup'), ['controller' => 'WorkflowCheckBackups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workflow Checks'), ['controller' => 'WorkflowChecks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workflow Check'), ['controller' => 'WorkflowChecks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('l_name');
            echo $this->Form->control('f_name');
            echo $this->Form->control('address');
            echo $this->Form->control('c_no');
            echo $this->Form->control('email');
            echo $this->Form->control('desig');
            echo $this->Form->control('password');
            echo $this->Form->control('role_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->control('dso_master_id', ['options' => $dsoMasters, 'empty' => true]);
            echo $this->Form->control('sdo_master_id', ['options' => $sdoMasters, 'empty' => true]);
            echo $this->Form->control('bso_master_id', ['options' => $bsoMasters, 'empty' => true]);
            echo $this->Form->control('mo_master_id', ['options' => $moMasters, 'empty' => true]);
            echo $this->Form->control('depot_master_id', ['options' => $depotMasters, 'empty' => true]);
            echo $this->Form->control('dmsfc_master_id', ['options' => $dmsfcMasters, 'empty' => true]);
            echo $this->Form->control('dso_sdo_bso_moID');
            echo $this->Form->control('group_id', ['options' => $groups]);
            echo $this->Form->control('district_id', ['options' => $districts]);
            echo $this->Form->control('block_city_id', ['options' => $blockCities, 'empty' => true]);
            echo $this->Form->control('rgi_district_code');
            echo $this->Form->control('rgi_block_code');
            echo $this->Form->control('status');
            echo $this->Form->control('password_old');
            echo $this->Form->control('loginFlag');
            echo $this->Form->control('lastLoginTime', ['empty' => true]);
            echo $this->Form->control('loginStatus');
            echo $this->Form->control('passwordChangeFlag');
            echo $this->Form->control('passwordChangeDate');
            echo $this->Form->control('districtName');
            echo $this->Form->control('blockName');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
            echo $this->Form->control('sub_division_id', ['options' => $subDivisions, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
