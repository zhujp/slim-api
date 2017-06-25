<?php 
namespace app\controllers;

class Controller
{

    /**
     * 构造响应数据数组
     * @param  array  $data 返回的数据
     * @param  integer $code 0表示正常，1表示错误
     * @param  string  $msg  错误消息提示
     * @return array        响应数据
     */
    public function createResponse($data,$code=0,$msg='')
    {
        return array (
            'data' => $data,
            'code' => $code,
            'msg' => $msg
            );
    }
}