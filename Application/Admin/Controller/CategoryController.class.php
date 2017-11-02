<?php 
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller {

	//显示分类
	public function index(){
		$mdoel = M('category');
		$allcate = $mdoel->select();
		$this->assign('allcate',$allcate);
	    $this->display();
	}

	//显示添加页面
	public function addlist(){
		//获取目录分类信息
		$model = M('category');
		$cateinfo = $model->select();
		$this->assign('cateinfo',$cateinfo);		
		$this->display();
	}

	//显示修改页面
	public function editlist(){
		//获取目录分类信息
		$model = M('category');
		$cateinfo = $model->select();
		$this->assign('cateinfo',$cateinfo);		
		$getid = I('get.cate_id');
		$model = M('category');
		$cateinfobyid = $model->where("cate_id = '{$getid}'")->find();

		$this->assign('cateinfobyid',$cateinfobyid);
		$this->display();
	}

	//添加分类
	public function add(){
		$post = I('post.');
		//实例化分类
		$model = M('category');
		//判断分类是否已经存在
		$result = $model->where("cate_name = '{$post['cate_name']}'")->find();
		if(!$result){
			$model->add($post);
			if($model){
				$this->redirect('index',NULL,1,'添加成功');
			}else{
				$this->redirect('index',NULL,1,'添加失败');
			}
		}else{
			$this->redirect('addlist',NULL,1,'此分类已经存在，请重新输入');
		}
		
			    
	}

	//修改分类
	public function edit(){
	    //接收修改后数据
		$post = I('post.');
		$post['cate_id'] = intval($post['cate_id']);
		$post['cate_pid'] = intval($post['cate_pid']);
		dump($post);
		if($post){
			$model = M('category');
			$result = $model->save($post);
			if($result){
				$this->redirect('index',NULL,1,'修改成功');
			}else{
				$this->redirect('index',NULL,10,'修改失败');

			}
			
		}else{
			$this->redirect('index',NULL,1,'修改失败');
	
		}
	}

	//删除分类
	public function delete(){
		$get = I('get.cate_id');
		$model = M('category');
		$result = $model->delete($get);
		if($result){
			$this->redirect('index',NULL,1,'删除成功');
		}else{
			$this->redirect('index',NULL,1,'删除失败');
		}
	}


	//批量删除分类
	public function delmany(){
	    $getbyid = I('post.cate_id');
	    //dump($getid); 
	    //判断是否有值
	    if($getbyid){
	    	//将数组合并分为字符串
	    	$cateids = implode(',',$getbyid);
	    	$model = M('category');
	    	$result = $model->delete($cateids);
	    	if($result){
	    		$this->redirect('index',NULL,1,'删除成功');
	    	}else{
				$this->redirect('index',NULL,1,'删除成功');	    		
	    	}
	    }else{
	    	$this->redirect('index',NULL,1,'请选择要删除的分类！');
	    }
	}

}