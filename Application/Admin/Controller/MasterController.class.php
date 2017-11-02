<?php
namespace Admin\Controller;
use Think\Controller;
class MasterController extends Controller {

	//显示站长信息
    public function index(){
    	$model = M('master');
    	$masterInfo = $model->find();
    	//dump($masterInfo);
    	$this->assign('masterInfo',$masterInfo);
        $this->display();
    }

    //编辑站长信息
    public function edit(){
        $post = I('post.');
        $post['id'] =  intval($post['id']);
        dump($post);
        if($post){
        	$model=M('master');
        	$result = $model->save($post);
        	if($result){
        		$this->redirect('index',null,1,'修改成功啦！');
        	}else{
               	$this->redirect('index',null,10,'修改失败啦！');
        	}
        }else{
        	$this->redirect('index',null,1,'修改失败');
        }
    }



}  