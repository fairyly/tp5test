<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'username'         => 'require|unique:user',
        'mobile'           => 'number|length:11',
        'email'            => 'email',
    ];
    protected $message = [
        'username.require'         => '请输入用户名',
        'username.unique'          => '用户名已存在',
        'mobile.number'            => '手机号格式错误',
        'mobile.length'            => '手机号长度错误',
        'email.email'              => '邮箱格式错误',

    ];

}