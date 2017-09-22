<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;

use app\admin\model\User as UserModel;
use app\admin\controller\Common;
class Index extends Common
{
    public function index()
    {

        return $this->fetch();
    }

}
