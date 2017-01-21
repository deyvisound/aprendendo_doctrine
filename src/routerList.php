<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Entity\Category;

//Chamando EntityManager

$entityManager = getEntityManager();

//Criando Rotas

$map->get('home', '/', function($request, $response) use($view, $entityManager){
    return $view->render($response, 'home.phtml', [
        'teste'=> 'slim php view funcionando!!@!'
    ]);    
});

$map->get('categories.list', '/categories', function($request, $response) use($view, $entityManager){
    $repository = $entityManager->getRepository(Category::class);
    $categories = $repository->findAll();
    
    return $view->render($response, 'categories/list.phtml', [
        'categories'    => $categories
    ]);    
});