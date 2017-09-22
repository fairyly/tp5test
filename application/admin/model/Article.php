<?php

namespace app\admin\model;

use think\Model;
use think\Db;


class Article extends Model
{
    protected $insert = ['create_time'];

    protected function setCreateTimeAttr() {
        return time();
    }
//    public function getStatusAttr($value)
//    {
//        $status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
//        return $status[$value];
//    }

}

