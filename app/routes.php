<?php 

$app->get('/', function($request,$response){
    return $response->write('delete');
});

$app->get('/user/{name}', app\controllers\UserController::class.':user');

