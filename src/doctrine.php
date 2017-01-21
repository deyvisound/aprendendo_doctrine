<?php

//Temos que apontar o tipo de mapeamento

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//Temos que configurar o caminho de nossas entidades.
$paths = [
    __DIR__.'/Entity'
];

$isDevMode = true;

//Informações de configuração com o banco

$dbParams = [
    'driver' => 'pdo_mysql',
    'user'   => 'root',
    'password' => '102030',
    'dbname'   => 'doctrine_basico'
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

function getEntityManager(){
    global $entityManager;
    return $entityManager;
}

