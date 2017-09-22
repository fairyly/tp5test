<?php
namespace app\admin\model;

use think\Model;

class User extends Model
{
    protected $insert = ['create_time'];

    protected function setCreateTimeAttr() {
        return time();
    }
}