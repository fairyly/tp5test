<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Upload extends Controller
{
    public function index(){
       return $this->fetch();
    }
    public function upload() {
        $file = $this->request->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');

        if ($info) {
            $result = [
                'code' => 0,
                'msg'  => '上传成功',
                'data' => [
                    'src'   => '/public/uploads/' . str_replace('\\', '/', $info->getSaveName()),
                    'title' => ''
                ]
            ];
        } else {
            $result = [
                'code' => -1,
                'msg'  => $file->getError()
            ];
        }
        return json($result);
    }
}
