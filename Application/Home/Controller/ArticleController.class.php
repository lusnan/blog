<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
	public function index(){
	    
	}

	//显示文章内容
    public function showArt(){

    	//根据id获取文章信息
        $getbyid = I('get.art_id');
        //dump($getbyid);
        $artModel = D('article');
        $artinfo = $artModel->where("art_id = $getbyid")->find();
        $this->assign('artinfo',$artinfo);
        //dump($artInfo);

        //获取一级分类信息
        $cateModel = D('category');
        $catinfo = $cateModel->firstCate();
        $this->assign('cateinfo',$catinfo);

        //获取评论信息
        $comModel = M('comment');
        $cominfo = $comModel->where("art_id = $getbyid")->select();
        $this->assign('cominfo',$cominfo);
        $this->display('index');

    }

    //改变文章的赞数
    public function zannums(){
        echo 110;
        $get = I('get.');
        $art_id = intval($get['art_id']);
        $likes = intval($get['zannum']);
        $model = M('article');
        $arr  = array('art_id' => $art_id, 'likes' =>$likes );
        $model->save($arr);
    }


    //文章评论信息
    public function comment(){
        $getcom = I('post.');
        dump($getcom);
        $com['cmt_user'] = session('username');
        $com['cmt_time'] = date('Y-m-d H:i:s');
        $com['art_id'] = intval($getcom['art_id']);
        $com['cmt_content'] = $getcom ['content'];
        $comModel = M('comment');
        $comModel->add($com);
        $this->redirect('showArt',array('art_id' => $com['art_id']));
    }


}    