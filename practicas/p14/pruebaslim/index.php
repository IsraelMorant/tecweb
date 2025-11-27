<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
// /myapp/api is the api folder http://domain/myapp/api/
$app->setBasepath('/tecweb/practicas/p14/pruebaslim');
$app->addBodyParsingMiddleware();

$app->addRoutingMiddleware();
//$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true,true,true);


//Hola mundo
$app->get('/',function($request,$response,$args){

$response->getBody()->write("Hola mundo Slim!!!!");


return $response;

});


//Paso de parametros

$app->get('/hola[/{nombre}]', function($request,$response,$args){



    $response->getBody()->write("Hola,".$args["nombre"]);


    return $response;
});

//Paso de parametros metodo Post


$app->post('/postprueba', function( $request,  $response, $args){

$reqPost = $request->getParsedBody();

$val1 = $reqPost['val1'];
$val2 = $reqPost['val2'];


$response->getBody()->write('Valores:'. $val1. " ". $val2);

return $response;




});


//Generar un JSON de salida

$app->get('/testjson', function($request,$response,$args){

    $data[0]["nombre"]="Israel";
    $data[0]["apellidos"]="Morante Luna";

    $data[1]["nombre"]="Isael";
    $data[1]["apellidos"]="Perez Sanchez";


    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));


    return $response;

});

$app->run();

?>