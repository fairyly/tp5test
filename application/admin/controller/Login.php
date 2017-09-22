<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use app\admin\model\User as UserModel;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch('login');
    }
    public function dologin(){
        if ($this->request->isPost()){
            $data = input('post.');
            $validate = $this->validate($data, 'Login');
            if ($validate!==true){
                $this->error($validate);
            }else{
                $where['username'] = $data['username'];
                $where['password'] = $data['password'];
                $userinfo=UserModel::where($where)->find();
                if ($userinfo){
                    if ($userinfo['status']==0){
                        $this->error('当前用户已禁用');
                    }else{
                        Session::set('user_id',$userinfo['id']);
                        Session::set('username', $userinfo['username']);
                        UserModel::update(
                            [
                                'last_login_time' => time(),
                                'last_login_ip'   => $this->request->ip(),
                                'id'              => $userinfo['id']
                            ]
                        );
                        $this->success('登录成功', 'admin/index/index');
                    }
                }else{
                    $this->error('用户名或密码错误');
                }
            }
        }
    }
    /**
     * 退出登录
     */
    public function logout() {
        Session::delete('userinfo');
        $this->success('退出成功', 'admin/login/index');
    }

}
