<?php
/**
 * Created by gongbin.
 * User: gongbin
 * For Manage
 * Date: 2016/07/31
 */
namespace app\admin\controller;
use think\Request;

class Login extends Admin
{
    public function index(Request $request)
    {
    	if(IS_POST){
            $username=input('post.user_name');
            $password=input('post.password');           

            //在检测用户名和密码
            $result=model("User")->login($username,$password);
            if($result){
                    $ip=getIp();
                    Adminlog( session("user")['user_name'], 'LOGIN', 'User' ,session("user")['user_id'],json_encode(array("IP" => $ip)));
                    //var_dump("success");
                    $this->redirect("/admin/Index/index");
            }else{
            	    //var_dump("error");
                    $this->showError("用户名或密码错误");
            }
    	}
    	//模版输出
        return $this->fetch('index');
    }


    public function login()
    {
        return $this->fetch();
    }
}
