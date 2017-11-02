<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
	// 登陆验证
	public function checkLogin(){	
        	$user = 	M('user');
        	$username = I('POST.username');
        	$uresult = $user->where("username = '{$username}' ")->find();
        	if($uresult){
        		//用户名正确的话就验证密码
        		if($uresult['password'] == I('POST.password')){     			
        			//保存为session登录状态
        			session('username',$uresult['username']);
        			$msg['code'] = 1;
        		}else{
        			$msg['msg'] = '密码错误';
        			$msg['code'] = 0;
        		}
        	}else{
        		$msg['msg'] = '用户名不存在';
        		$msg['code'] = 0;       
            }
        exit(json_encode($msg));		
	}

	//注册验证
	public function signup(){
	    $captcha = I('POST.captcha');
        //先验证验证码
        //tp经过加密，是取不到验证码的，但可以验证
        $verify = new \Think\Verify();
        $vresult = $verify->check($captcha);       
        if($vresult){
        	//验证码正确的话就验证用户名
        	$user = M('user');
        	$username = I('POST.username');
        	$uresult = $user->where("username = '{$username}' ")->find();
        	if($uresult){
        		$msg['msg'] = '用户名已存在！';
        		$msg['code'] = 0;
        	}else{
        		$msg['msg'] = '注册成功！';
        		$msg['code'] = 1;
        		//将数据入库
        		$model = M('user');
        		$data = I('post.');
        		$model->add($data);
        	}
        }else{
        	$msg['msg'] = '验证码错误！';
        	$msg['code'] = 0;
        }

		exit(json_encode($msg));	
	}

	//退出登陆
	public function logout(){
	    session('username',null);
	    $msg['msg'] = '退出成功';
	    exit(json_encode($msg));
	}


    
    


}