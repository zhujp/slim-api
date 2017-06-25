<?php 
/**
 * 项目公共函数库
 */

function p($data,$is_exit=true)
{
    echo "<pre>";
    var_dump($data);
    echo "<pre>";
    if ($is_exit) {
        exit;
    }
}