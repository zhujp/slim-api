<?php 
namespace app\controllers;

use app\models\Users;

class UserController extends Controller
{
    
    public function user($request, $response, $args) {
        $user = Users::where('username',$args['name'])->first();

        $data = $this->createResponse($user);
        return $response->withJson($data);
        // return $response->withHeader('username','vilay')->write('hello '.$user['email']);
    }
}