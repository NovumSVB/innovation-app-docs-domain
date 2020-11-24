<?php

use Model\Account\UserQuery;
use Model\Setting\MasterTable\RoleQuery;

$oUserQuery = UserQuery::create();
$oUser = $oUserQuery->findOneByEmail('anton@nui-boutkam.nl');

$aUser = [
    'id' => $oUser ? $oUser->getId() : null,
    'is_deleted' => false,
    'can_change_roles' => true,
    'role_id' => RoleQuery::create()->findOneByName('Admin')->getId(),
    'first_name' => 'Anton',
    'last_name' => 'Boutkam',
    'email' => 'anton@nui-boutkam.nl',
    'password' => '******'

];

$oCrudUserManager = new \Crud\User\CrudUserManager();
$oCrudUserManager->save($aUser);
