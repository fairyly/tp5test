<?php
//配置文件
return [
    'auth'        => [
        // 权限开关
        'auth_on'           => 1,
        // 认证方式，1为实时认证；2为登录认证。
        'auth_type'         => 1,
        // 用户组数据不带前缀表名
        'auth_group'        => 'group',
        // 用户-用户组关系不带前缀表
        'auth_group_access' => 'user_group',
        // 权限规则不带前缀表
        'auth_rule'         => 'rules',
        // 用户信息不带前缀表
        'auth_user'         => 'user',
    ],

];