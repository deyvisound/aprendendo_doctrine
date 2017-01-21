<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Aura\Router\RouterContainer;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;
use Slim\Views\PhpRenderer;

$ajax = false;

//Boas práticas dizem que variáveis do tipo ' $_ ' não devem ser acessadas diretamente.
$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_COOKIE, $_POST, $_GET, $_FILES
);

//Container para routas, armazenará rotas
$routerContainer = new RouterContainer();

$generator = $routerContainer->getGenerator();

//Auxiliará na criação de rotas
$map = $routerContainer->getMap();

$view = new PhpRenderer(__DIR__."/../templates/");

//incluindo rotas
include __DIR__."/routerList.php";

//Instanciando combinador...
$matcher = $routerContainer->getMatcher();

//Verifica se o request combina com alguma rota, se não combinar, recebe false.
$router = $matcher->match($request);

foreach ($router->attributes as $key => $value) {
    $request = $request->withAttribute($key, $value);
}

$callable = $router->handler;

/*@var $response Response*/
$response = $callable($request, new Response());

if($ajax){
    echo $response->getBody();
}else{
    include __DIR__. "/../templates/header.phtml";
        echo $response->getBody();
    include __DIR__. "/../templates/footer.phtml";
}
