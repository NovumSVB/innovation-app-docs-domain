<?php
use Core\Cfg;
use Core\QueryMapper;
use Core\Environment;
use Model\Cockpit\Foodbox\RecipeProductQuery;
use Model\CustomerQuery;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;

if(Environment::isDevel())
{
    $aConfig = [
        'PROTOCOL' => 'http',
        'ADMIN_PROTOCOL' => 'http',
	    'ADMIN_URL' => 'admin.docs.novum.nuidev.nl',
        'CUSTOM_NAMESPACE' => 'NovumDocs',
        'CUSTOM_FOLDER' => 'novum.docs',
        'DOMAIN' => 'docs.novum.nuidev.nl',
        'DATA_DIR' => '/home/novum/platform/data'
    ];
}
else
{
    $aConfig = [
        'PROTOCOL' => 'https',
        'ADMIN_PROTOCOL' => 'http',
        'ADMIN_URL' => 'admin.docs.demo.novum.nu',
        'CUSTOM_NAMESPACE' => 'NovumDocs',
        'CUSTOM_FOLDER' => 'novum.docs',
        'DOMAIN' => 'docs.demo.novum.nu',
        'DATA_DIR' => '/home/novum/platform/data'
    ];
}


Cfg::set($aConfig);

