<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

use think\Session;

class Common extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->checkLogin();
    }


    public function checkLogin()
    {
        if (!Session::has('user_id')) {
            $this->redirect('admin/login/index');
        }
    }

}