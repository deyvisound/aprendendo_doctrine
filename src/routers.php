<?php

/**
 * Description of routers
 *
 * @author Deyvison Rodrigo B. Estevam <deyvison_rodrigo@hotmail.com>
 * @date Jul 18, 2016
 * 
 */

use Aura\Router\RouterContainer;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Slim\Views\PhpRenderer;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

$view = new PhpRenderer(__DIR__.'/../templates/');

$map->get("home", "/", function($request, $response) use ($view){
    return $view->render($response, 'home.phtml',[
        'test' => 'slim phpview está funcionando'
    ]);
});

$map->get("categories.list", "/categories", function($request, $response) use ($view){
    return $view->render($response, 'categories/list.phtml',[
        'test' => 'slim phpview está funcionando'
    ]);
});

$matcher = $routerContainer->getMatcher();

$route = $matcher->match($request);

foreach ($route->attributes as $key => $value) {
    $request = $request->withAttribute($key, $value);
}

$callable = $route->handler;

/*@var $response Response*/
$response = $callable($request, new Response());

echo $response->getBody();

