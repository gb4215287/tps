<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function Adminlog($user_name,$action,$class_name,$class_obj,$result){
    $data=array(
        "user_name"=>$user_name,
        "action"=>$action,
        "class_name"=>$class_name,
        "class_obj"=>$class_obj,
        "result"=>$result,
        "op_time"=>time()
    );
    $res=model("SysLog")->save($data);
    return $res;
}
function getIp() {
    if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" )) {
        $ip = getenv ( "HTTP_CLIENT_IP" );
    } elseif (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" )) {
        $ip = getenv ( "HTTP_X_FORWARDED_FOR" );
    } elseif (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" )) {
        $ip = getenv ( "REMOTE_ADDR" );
    } elseif (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" )) {
        $ip = $_SERVER ['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }
    return ($ip);
}
