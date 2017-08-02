<?php
namespace app\admin\controller;

class Questionnaire extends Admin
{
    public function index()
    {
        return $this->fetch();
    }
}