<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Admin extends Controller
{
    public function _initialize()
    {
        // 获取当前页的模块、控制器和方法名
        define('MODULE_NAME', strtolower(Request::instance()->module()));
        define('CONTROLLER_NAME', strtolower(Request::instance()->controller()));
        define('ACTION_NAME', strtolower(Request::instance()->action()));
        $this->assign('MODULE_NAME', MODULE_NAME);
        $this->assign('CONTROLLER_NAME', CONTROLLER_NAME);
        $this->assign('ACTION_NAME', ACTION_NAME);

        // 后台权限控制
        //echo 'admin/initialize';
        define('IS_GET',        Request::instance()->isGet());
        define('IS_POST',       Request::instance()->isPost());
        define('IS_PUT',        Request::instance()->isPut());
        define('IS_DELETE',     Request::instance()->isDelete());
    }
    public function showError($error){
        $this->assign("error",$error);
    }
}