<?php 
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {

	//文章管理首页
	public function index(){
		//运用联表查询 查询到分类名cate_name
		$model = M(); //执行原生的sql语句可以不用关联表	
		//分页 ->limit($page->firstRow,$page->listRows)
		$allart = $model->field('t1.*,t2.cate_name as cate_name')->table('article as t1,category as t2')->where('t1.cate_id = t2.cate_id and is_del = "0"')->order('cate_name')->select();
		$count = count($allart);
		$page = new \Think\Page($count,8);
		$showpage = $page->show();
		$allart = $model->field('t1.*,t2.cate_name as cate_name')->table('article as t1,category as t2')->where('t1.cate_id = t2.cate_id and is_del = "0"')->limit($page->firstRow,$page->listRows)->order('cate_name')->select();
		$this->assign('showpage',$showpage);
		$this->assign('allart',$allart);
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

		$getid = I('get.art_id');
		$model = M('article');
		$artinfobyid = $model->where("art_id = '{$getid}'")->find();
		$this->assign('artinfobyid',$artinfobyid);
		$this->display();
	}

	//添加文章
	public function add(){
		$artinfo = I('post.');
		//实例化控制器
		$model =D('article');
		//保存数据
		$result = $model->saveData($artinfo,$_FILES['thumb']);
		if($result){			
				$this->redirect('index',NULL,1,'添加成功');
			
		}else{
			$this->redirect('addlist',NULL,1,'添加失败！');
		}
		
			    
	}

	//修改文章
	public function edit(){
	    //接收修改后数据
		$post = I('post.');
		$post['art_id'] = intval($post['art_id']);
		$post['cate_id'] = intval($post['cate_id']);
		if($post){
			$model = M('article');
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

	//逻辑删除文章，假删除，放入回收站
	public function delete(){
		$getbyid = I('get.art_id');
		$model = M('article');
		echo $get;
		$data = array(
	    			'art_id' => $getbyid,
	    			'is_del' => '1'
	    		);

		$result = $model->save($data);
		if($result){
			$this->redirect('index',NULL,1,'加入回收站成功');
		}else{
			$this->redirect('index',NULL,1,'加入回收站失败');
		}
	}

	//批量逻辑删除文章
	public function delmany(){
	    $getbyid = I('post.art_id');
	    //判断是否有值
	    if($getbyid){
	    	$model = M('article');
	    	//使用循环进行更新
	    	foreach($getbyid as $art_id){
	    		$data = array(
	    			'art_id' => $art_id,
	    			'is_del' => '1'
	    		);
	    		$result = $model->save($data);
	    		
	    	}
	    	if($result){
	    		$this->redirect('index',NULL,1,'加入回收站成功');
	    	}else{
				$this->redirect('index',NULL,1,'加入回收站失败');	    		
	    	}
	    	
	    }else{
	    	$this->redirect('index',NULL,1,'请选择要加入回收站的文章！');
	    }
	}

	//显示回收站
	public function recyclelist(){		
	    $model = M('article');
		$allarts = $model->where('is_del = "1"')->select();
		$count = count($allarts);
		$page = new \Think\Page($count,2);
		$showpage = $page->show();
		$allart = $model->where('is_del = "1"')->limit($page->firstRow,$page->listRows)->select();
		$this->assign('showpage',$showpage);
		$this->assign('allart',$allart);
	    $this->display();
	}

	//真实删除
	public function realDelete(){
	    $getbyid = I('get.art_id');
		$model = M('article');
		$result = $model->delete($getbyid);
		if($result){
			$this->redirect('recyclelist',NULL,1,'删除成功');
		}else{
			$this->redirect('recyclelist',NULL,1,'删除失败');
		}
	}


	//真实批量删除
	public function realDelmany(){
	    $getbyid = I('post.art_id');
	    //dump($getid); 
	    //判断是否有值
	    if($getbyid){
	    	//将数组合并分为字符串
	    	$artids = implode(',',$getbyid);
	    	$model = M('article');
	    	$result = $model->delete($artids);
	    	if($result){
	    		$this->redirect('recyclelist',NULL,1,'批量删除成功');
	    	}else{
				$this->redirect('recyclelist',NULL,1,'批量删除失败');	    		
	    	}
	    }else{
	    	$this->redirect('recyclelist',NULL,1,'请选择要删除的文章！');
	    }
	}

	//回收站还原
	public function recover(){
	    $getbyid = I('get.art_id');
	    $model = M('article');
		$data = array(
	    			'art_id' => $getbyid,
	    			'is_del' => '0'
	    		);

		$result = $model->save($data);
		if($result){
			$this->redirect('index',NULL,1,'还原成功');
		}else{
			$this->redirect('index',NULL,1,'还原失败');
		}
	}







}	