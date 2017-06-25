<?php 

$app->get('/', function($request,$response){
    return $response->write('Hello world');
});

$app->get('/user/{name}', app\controllers\UserController::class.':user');

