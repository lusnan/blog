<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        
        //获取一级分类信息
        $cateModel = D('category');
        $cateinfo = $cateModel->firstCate();
        $this->assign('cateinfo',$cateinfo);

        //获取最热文章
        $artModel = D('article');
        $hotart = $artModel->getHot();
        $this->assign('hotart',$hotart);


        //获取站长信息
        $masterModel = M('master'); 
        $masterInfo = $masterModel->find();
        $this->assign('masterInfo',$masterInfo);

        //获取所有文章信息
        $artinfos = $artModel->where('is_del = "0"')->order('addtime desc')->select();

        

        //制作分页
        $count = count($artinfos);
        $page = new \Think\Page($count,10);
        $showpage = $page->show();
        $artinfos = $artModel->where('is_del = "0"')->order('addtime desc')->limit($page->firstRow,$page->listRows)->select();
        $this->assign('showpage',$showpage);
        $this->assign('artinfos',$artinfos);
        $this->display();
    }

    //分类目录页
    public function category(){
        //先引入一级分类
        $cateModel = D('category');
        $cateinfo = $cateModel->firstCate();
        $this->assign('cateinfo',$cateinfo);
        //获取站长信息
        $model1 = M('master'); 
        $masterInfo = $model1->find();
        $this->assign('masterInfo',$masterInfo);

        //获取最热文章
        $artmodel = D('article');
        $hotart = $artmodel->getHot();
        $this->assign('hotart',$hotart);
        
        //引入当前分类下的所有文章
        $cate_id = I('get.cate_id');
        $catename = $cateModel->getcatname($cate_id );
        $artModel = M('article');
        $artinfos = $artModel->where("cate_id = '{$cate_id}' and is_del='0'")->select();
        //制作分页
        $count = count($artinfos);
        $page = new \Think\Page($count,10);
        $showpage = $page->show();
        $artinfos = $artModel->where("cate_id = '{$cate_id}' and is_del='0'")->order('addtime desc')->limit($page->firstRow,$page->listRows)->select();
        $this->assign('showpage',$showpage);
        $this->assign('catename',$catename);
        $this->assign('artinfos',$artinfos);
        $this->display();
    }

    //搜索框搜索功能
    public function search(){
        //获取一级分类信息
        $cateModel = D('category');
        $cateinfo = $cateModel->firstCate();
        $this->assign('cateinfo',$cateinfo);

        //获取最热文章
        $artModel = D('article');
        $hotart = $artModel->getHot();
        $this->assign('hotart',$hotart);


        //获取站长信息
        $masterModel = M('master'); 
        $masterInfo = $masterModel->find();
        $this->assign('masterInfo',$masterInfo);

        //获取所有文章信息
        $statement = I('post.search');
        $artinfos = $artModel->searchArts($statement);

        

        //制作分页
        $count = count($artinfos);
        $page = new \Think\Page($count,2);
        $showpage = $page->show();
        
        $this->assign('showpage',$showpage);
        $this->assign('artinfos',$artinfos);
        $this->assign('statement',$statement);
        $this->display('index');

        

    }


    

    //生成验证码
    public function captcha(){
        //ob_clean这个函数的作用就是用来丢弃输出缓冲区中的内容，防止验证码输出失败
        ob_clean();
        $yzm = array(
                    'fontttf'   =>  '2.ttf',              //验证码字体
                    'font-size' => 18,
                    'useCurve'  =>  false,            // 是否画混淆曲线
                    'useNoise'  =>  false,            // 是否添加杂点 
                    'imageH'    =>  0,               // 验证码图片高度
                    'imageW'    =>  0,               // 验证码图片宽度
                    'length'    =>  4               // 验证码位数

                );
         
        $verify = new \Think\Verify($yzm);
        //输出验证码
        $verify -> entry();
    }

    




}