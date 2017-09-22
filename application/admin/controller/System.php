<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Cache;
use app\admin\controller\Common;
use app\admin\model\System as SystemModel;

class System extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        if (Cache::has('site_config')){
            //查询缓存
            $System['value']=Cache::get('site_config');
        }else{
            //查询数据库
            $System=SystemModel::where('name', 'site_config') -> field('value')->find();
        }
        $site_config = unserialize($System['value']);
        return $this->fetch('index', ['site_config' => $site_config]);
    }

    /**
     * 提交配置
     */
    public function updateSiteConfig() {
        $site_config   = $this->request->post('site_config/a');
        $value=serialize($site_config);
        if (SystemModel::where('name', 'site_config')->setField('value' , $value)) {
            Cache::set('site_config', $value);
            $this->success('提交成功');
        } else {
            $this->error('提交失败');
        }
    }

    /**
     * 清除缓存
     */
    public function clear() {
        if (delete_dir_file(CACHE_PATH) || delete_dir_file(TEMP_PATH)) {
            $this->success('清除缓存成功');
        } else {
            $this->error('清除缓存失败');
        }
    }


}
