<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Diactoros\Response\RedirectResponse;
use App\Entity\Category;
use Psr\Http\Message\ServerRequestInterface;
use Doctrine\ORM\EntityManager;

//Chamando EntityManager

/*@var $entityManager EntityManager*/
$entityManager = getEntityManager();

//Criando Rotas

$map->get('home', '/', function($request, $response) use($view, $entityManager){
    return $view->render($response, 'home.phtml', [
        'teste'=> 'slim php view funcionando!!@!'
    ]);    
});

//Listando categorias//////////
$map->get('categories.list', '/categories', function($request, $response) use($view, $entityManager){
    return listCategories($request, $response, $view, $entityManager);   
});

$map->get('categories.list2', '/categories/list', function($request, $response) use($view, $entityManager){
    return listCategories($request, $response, $view, $entityManager);   
});
//////////////////////////////

//Criando Categorias//////////
$map->get('categories.create', '/categories/create', function($request, $response) use($view){       
    return $view->render($response, 'categories/create.phtml');    
});
//////////////////////////////

//Criando Categorias//////////
$map->post('categories.store', '/categories/store', function(ServerRequestInterface $request, $response) use($view, $entityManager, $generator){       
    //Recebndo nosso array de dados
    $data = $request->getParsedBody();
    
    //inserindo dados
    $category = new Category();
    $category->setName($data["name"]);
    
    $entityManager->persist($category);
    $entityManager->flush();
            
    $uri = $generator->generate("categories.list");
    return new RedirectResponse($uri);
});
//////////////////////////////

function listCategories($request, $response, $view, $entityManager){
    $repository = $entityManager->getRepository(Category::class);
    $categories = $repository->findAll();
    
    return $view->render($response, 'categories/list.phtml', [
        'categories'    => $categories
    ]); 
}