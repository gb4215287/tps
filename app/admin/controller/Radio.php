<?php
namespace app\admin\controller;

class Radio extends Admin
{
    /**
     * 单选题列表
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 添加单选题
     */
    public function add()
    {
        return $this->fetch('add');
    }
    public function add2()
    {
        return $this->fetch('add2');
    }

    /**
     * 修改单选题
     */
    public function edit()
    {
        echo 'radio/edit';
        exit;
        return $this->fetch();
    }
}