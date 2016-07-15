<?php

/**
 * Description of doctrine
 * 
 * Arquivo de configuração do doctrine.
 *
 * @author Deyvison Rodrigo B. Estevam <deyvison_rodrigo@hotmail.com>
 * @date Jul 14, 2016
 * 
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$path = array(
    __DIR__.'/Entity'
);

$isDevMode = true;

$dbParams = array(
    'driver'    =>  'pdo_mysql',    
    'user'      =>  'deyvison',
    'password'  =>  'vida',
    'dbname'    =>  'doctrine_basico_curso',
);

$config = Setup::createAnnotationMetadataConfiguration($path, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

function getEntityManager(){
    global $entityManager;
    
    return $entityManager;
}