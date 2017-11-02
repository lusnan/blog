<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model {
    public function firstCate(){
    	//调出一级分类信息
    	return $this->where('cate_pid = 0')->select();   	
    }

    //获取当前分类下的cate_name
    public function getcatname($cate_id){
        $cateinfo = $this->where("cate_id = $cate_id")->find();
        return $cateinfo['cate_name'];
    }




}    