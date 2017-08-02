<?php
namespace app\admin\controller;

class Index extends Admin
{
    public function index()
    {
        //dump(config());
        return $this->fetch();
    }


    public function login()
    {
        return $this->fetch();
    }
}
