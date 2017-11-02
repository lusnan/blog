<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model {

	//获取最热的文章
	public function getHot(){
	    $allart = $this->where('is_del="0"')->order('likes desc')->limit(10)->select();
	    return $allart;
	}

	//搜索框获取文章信息
	public function searchArts($sou){
		//遍历所有文章
	    $allarts = $this->where('is_del = "0"')->order('addtime desc')->select();
	    foreach ($allarts as  $artsinfo) {
	    	$title = $artsinfo['title'];
	    	$result = stripos($title, $sou);
	    	if($result !== false){
	    		$inarts[] = $artsinfo;
	    	}
	    }
	    return $inarts;
	}


	


}