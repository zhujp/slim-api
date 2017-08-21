<?php 
namespace app\controllers;

use app\models\Users;

class UserController extends Controller
{
    
    /**
     * 获取用户信息
     * @param  [type] $request  [description]
     * @param  [type] $response [description]
     * @param  [type] $args     [description]
     * @return [type]           [description]
     */
    public function getUser($request, $response, $args)
    {
        $user = Users::where('id',$args['id'])->first();
        $data = $this->createResponse($user);

        return $response->withJson($data);
    }



    /**
     * 创建用户
     * @param  [type] $request  [description]
     * @param  [type] $response [description]
     * @param  [type] $args     [description]
     * @return [type]           [description]
     */
    public function create($request, $response, $args)
    {
        $post = $request->getParsedBody();
        if (empty($post['name']) || empty($post['mobile'])) {
            $data = $this->createResponse(array(),422,'请填写完整信息');
            return $response->withJson($data);
        }
       
        $user = Users::create(
            [
                'name' => $post['name'],
                'mobile' => $post['mobile']
            ]);
        if ($user->id) {
            $data = $this->createResponse(array(
                'id'=>$user->id,
                'name'=>$user->name,
                'mobile'=>$user->mobile),201
            );
        } else {
            $data = $this->createResponse(array(),400,'用户创建失败');
        }
        
        return $response->withJson($data);
    }


    /**
     * 修改用户部分信息
     * @param  [type] $request  [description]
     * @param  [type] $response [description]
     * @return [type]           [description]
     */
    public function patch($request, $response, $args)
    {
        $post = $request->getParsedBody();
        if (empty($post)) {
            $data = $this->createResponse(array(),422,'数据传输错误');
            return $response->withJson($data);
        }
        $user = Users::where('id',$args['id'])->first();
        if (empty($user)) {
            $data = $this->createResponse(array(),404,'用户不存在');
        }
        foreach ($post as $key=>$val) {
            $user->$key = $val;
        }
        if ($user->update()) {
            $data = $this->createResponse(array(
                'id'=>$user->id,
                'name'=>$user->name,
                'mobile'=>$user->mobile),
                201
            ); 
        } else {
            $data = $this->createResponse(array(),400,'用户更新失败');
        }

        return $response->withJson($data);
    }


    /**
     * 删除用户
     * @param  [type] $request  [description]
     * @param  [type] $response [description]
     * @param  [type] $args     [description]
     * @return [type]           [description]
     */
    public function delete($request, $response, $args)
    {
        $user = Users::where('id',$args['id'])->first();
        if (empty($user)) {
            $data = $this->createResponse(array(),404,'用户不存在');
            return $response->withJson($data);
        }

        if ($user->delete()) {
            $data = $this->createResponse(array(),204,'用户删除成功');
        } else {
            $data = $this->createResponse(array(),-1,'用户删除失败');
        }
        
        return $response->withJson($data);
    }

    public function user($request, $response, $args) {
        $user = Users::where('username',$args['name'])->first();

        $data = $this->createResponse($user);
        return $response->withJson($data);
        // return $response->withHeader('username','vilay')->write('hello '.$user['email']);
    }
}