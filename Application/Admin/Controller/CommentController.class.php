<?php 
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {

	//评论管理首页
	public function index(){
		//运用联表查询 查询到分类名cate_name
		$model = M(); //执行原生的sql语句可以不用关联表	
		//分页 ->limit($page->firstRow,$page->listRows)
		$allcom = $model->field('t1.*,t2.title as title')->table('comment as t1,article as t2')->where('t1.art_id = t2.art_id ')->order('title')->select();
		$count = count($allcom);
		$page = new \Think\Page($count,8);
		$showpage = $page->show();
		$allcom = $model->field('t1.*,t2.title as title')->table('comment as t1,article as t2')->where('t1.art_id = t2.art_id ')->limit($page->firstRow,$page->listRows)->order('title')->select();
		$this->assign('showpage',$showpage);
		$this->assign('allcom',$allcom);
	    $this->display();
	}
	//真实删除
	public function delete(){
	    $getbyid = I('get.cmt_id');
		$model = M('comment');
		$result = $model->delete($getbyid);
		if($result){
			$this->redirect('index',NULL,1,'删除成功');
		}else{
			$this->redirect('index',NULL,1,'删除失败');
		}
	}


	//批量删除
	public function delmany(){
	    $getbyid = I('post.cmt_id');
	    //dump($getid); 
	    //判断是否有值
	    if($getbyid){
	    	//将数组合并分为字符串
	    	$cmtids = implode(',',$getbyid);
	    	$model = M('comment');
	    	$result = $model->delete($cmtids);
	    	if($result){
	    		$this->redirect('index',NULL,1,'批量删除成功');
	    	}else{
				$this->redirect('index',NULL,1,'批量删除失败');	    		
	    	}
	    }else{
	    	$this->redirect('index',NULL,1,'请选择要删除的文章！');
	    }
	}


}