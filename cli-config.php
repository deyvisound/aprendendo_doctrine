<?php

/**
 *  Description of cli-config
 *
 * @author Deyvison Rodrigo B. Estevam <deyvison_rodrigo@hotmail.com>
 * @date Jul 14, 2016
 * 
 */


use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap                                                                                                                  
require_once __DIR__.'/src/doctrine.php';

// replace with mechanism to retrieve EntityManager in your app                                                                                                     
$entityManager = getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
