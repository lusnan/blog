<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//检测是否登录
    	//这里不能用session 因为浏览器后退动作session是不会变的
    	if (!session("adminer_name")) {
			 $controller_name = CONTROLLER_NAME;
			 $active_name = ACTION_NAME;
			// echo $controller_name;
			// echo $active_name;
			$this->error('尚未登陆',"admin/index/login",1);
			exit;
		
		}
		$length['art'] = count(M('article')->select());
		$length['user'] = count(M('user')->select());
		$length['cmt'] = count(M('comment')->select());
		$this->assign('length',$length);
		$this->display();
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

	//载入登陆界面
	public function login(){
		$adminer_id = cookie("adminer_id");
		if($re_admin_id){
			$this->assign("adminer_name",cookie("adminer_name"));
			$this->assign("password",cookie("password"));
			$this->assign("autoFlag",1);
		}
		$this->display();
	}

	//验证操作,可以用js
	public function checkLogin(){	
        $captcha = I('POST.captcha');
        //先验证验证码
        //tp经过加密，是取不到验证码的，但可以验证
        $verify = new \Think\Verify();
        $vresult = $verify->check($captcha);       
        if($vresult){
        	//验证码正确的话就验证用户名
        	$adminer = D('Adminer');
        	$adminer_name = I('POST.adminer_name');
        	$uresult = $adminer->where("adminer_name = '{$adminer_name}' ")->find();
        	if($uresult){
        		//用户名正确的话就验证密码
        		if($uresult['password'] == I('POST.password')){
        			//判断是否勾选了记住密码
        			if(I('POST.autoFlag') == 1){
        				//将登录信息存放为cookie,用于保存调取密码
        				cookie('adminer_name',$uresult['adminer_name'],7*24*3600);
        				cookie('password',$uresult['password'],7*24*3600);
        				cookie('id',$uresult['id'],7*24*3600);
        			}
        			//保存为session 是为了验证是否为登录状态
        			session('adminer_name',$uresult['adminer_name']);
        			session('password',$uresult['password']);
        			session('id',$uresult['id']);
        			$msg['code'] = 1;
        		}else{
        			$msg['msg'] = '密码错误';
        			$msg['code'] = 0;
        		}
        	}else{
        		$msg['msg'] = '用户名不存在';
        		$msg['code'] = 0;
        	}
        }else{
        	$msg['msg']  = '验证码有错误';
        	$msg['code'] = 0;
        }
        exit(json_encode($msg));
		
	}

	//退出登录
	public function logout(){
		session('adminer_name',null);
		$this->redirect('login',null,1,'即将跳转到登陆界面');
		// $msg['msg'] = "退出成功";
		// // if(session("login_way") == 0){
		// // 	$msg['code'] = 0;
		// // }else{
		// // 	$msg['code'] = 1;
		// // }
		// // session("login_way",null);
		// exit(json_encode($msg));

	}

	
}