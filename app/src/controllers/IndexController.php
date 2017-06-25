<?php 
namespace app\controllers;

use app\models\Users;

class IndexController  {
    
    public function index($request, $response, $args) {
        // $this->view->render($response,'profile.html',['name'=>'vilay']);
        $user = Users::where('username','vilay')->first();
        return $response->write('hello '.$user->email);
    }
}