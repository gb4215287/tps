<?php
namespace app\index\controller;
use app\common\controller\Index as commonIndex;
use think\Db;
use think\Config;
use think\Env;
use think\Request;
use think\Controller;
use think\Model;
use app\index\model\Test;
class Test extends Controller{
    /*public function __construct() {
      config('before','beforeAction');
    }*/
    public function index(Request $request)
    {
    #   $this->assign('a',11);
    #   $list = ['user1'=>['name'=>'sanpei','email'=>'shaoye'],'user2'=>['name'=>'gaoyao','email'=>'tai']];     
    #   $this->assign('list',$list);
    #   return $this->fetch();
        //$test = new Test;
        //$list = $test->select();
        //$list=db('test')->order('id desc')->select();
        //$list = Db::connect('db')->query('select * from test');
        //$list=model("Test")->find();
        $list=model("Test")->select();
        var_dump($list);   
    }
}
