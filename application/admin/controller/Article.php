<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Cate as CateModel;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Common;

class Article extends Common
{
    public  function _initialize()
    {
        $clist= CateModel::getLevelList();
        $this->assign('clist',$clist);
    }

    //    修改页面加载
    public function edit($id){
        $article=ArticleModel::find($id);
        return $this->fetch('edit',['article'=>$article]);
    }

    public function update($id){
        if (Request::instance()->isPost()){
            $data  = $this->request->except('file');
//            查询类Query直接更新:update()
            if (ArticleModel::where('id',$id )-> update($data)){
                $this->success('更新成功');
            }else{
                $this->error('更新失败');
            }
        }
    }

   public function del($id){
       if ( @ArticleModel::get($id)->delete()){
           $this->success('删除成功');
       }else{
           $this->error('删除失败');
       }
   }
    public function add(){
        return $this->fetch();
    }
    public function save(){
        if ($this->request->isPost()){
            $data  = $this->request->except('file');
            $data['thumb'] =headpic($data['content']);
            if (ArticleModel::create($data)){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }
    }
    public function index($cid='', $keyword = '',$page=1)
    {

        $where=[];
        if ($cid){
            $where['cid'] = $cid;
        }
        if ($keyword){
            $where['title'] = ['like', "%{$keyword}%"];
        }
        $fieldA = ['id'=>'aid','title','author','reading','status', 'publish_time', 'sort'];
        $fieldC = ['id'=>'cid','pid', 'name'];
        $aclist =  Db::view('tp_Article',$fieldA)
               -> view('tp_cate',$fieldC,'tp_cate.id=tp_Article.cid','LEFT')
               -> where($where)
//               ->limit(5)
//               ->page($page)
//               ->select();
            ->paginate(10,false,['page',$page]);

        return $this->fetch('index',['aclist'=>$aclist,'cid'=>$cid, 'keyword'=>$keyword]);
    }


}
