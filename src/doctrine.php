<?php

/**
 * Description of doctrine
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
    'driver'    =>  'pdo-mysql',
    'deyvison'  =>  'vida',
    'dbname'    =>  'doctrine_basico_curso',
);

