<?php
namespace Admin\Model;
use Think\Model;

class ArticleModel extends Model{


	//数据保存
	public function saveData($post,$file){
		//dump($file);
		//补全addtime数据
		$post['addtime'] = date("Y-m-d H:i:s");
		//判断是否有文件需要处理
		if(!$file['error']){
			$arr = array(
				'savePath' =>'thumb/',
				'autoSub'       =>  false,  //不自动生成子目录（日期）
				'mimes' 	=> array('image/png','image/jpeg','image/gif','image/jpg') , 
				'rootPath'  =>  WORKING_PATH.UPLOAD_ROOT_PATH //保存路径
			);

			//处理上传
			$upload = new \Think\Upload($arr);
			//开始上传
			$info = $upload->uploadOne($file);

			if($info){
				//补全表中的缩略图字段
				$post['thumb'] = $info['name'];
				$post['thumbpath'] = UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];

			}

		}
		return $this->add($post);
	}

	

}