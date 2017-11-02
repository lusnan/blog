<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>个人博客后台管理系统</title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <link rel="stylesheet"  href="/Public/Admin/css/page.css">
    <script src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/pintuer.js"></script>
    <script src="/Public/Admin/js/respond.js"></script>
    <script src="/Public/Admin/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="lefter">
    <div class="title"><a href="<?php echo U('Index/index');?>" >博客后台</a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="/" target="_blank">前台首页</a>
                <a class="button button-little bg-yellow" href="<?php echo U('index/logout');?>">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li class="active"><a href="" class="icon-home"> 开始</a>
                    <ul>
                        <li><a href="<?php echo U('Category/index');?>">分类管理</a>
                        </li>
                        <li><a href="<?php echo U('Article/index');?>">文章管理</a></li>
                        <li><a href="<?php echo U('Comment/index');?>">评论管理</a></li>
                        <li><a href="<?php echo U('Master/index');?>">站长管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，<?php echo (session('adminer_name')); ?>，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="<?php echo U('Index/index');?>" class="icon-home"> 开始</a></li>
                <li>后台首页</li>
            </ul>
        </div>
    </div>
</div>
<div class="admin">
	<div class="line-big">
    	<div class="xm3">
        	<div class="panel border-back">
            	<div class="panel-body text-center">
                	<img src="/Public/images/headpic2.jpg" width="120" class="radius-circle" /><br/>
                    
                </div>
                
            </div>
            <br />
        	<div class="panel">
            	<div class="panel-head"><strong>站点统计</strong></div>
                <ul class="list-group">
                	<li><span class="float-right badge bg-red"><?php echo ($length['user']); ?></span><span class="icon-user"></span>用户</li>
                    <li><span class="float-right badge bg-main"><?php echo ($length['art']); ?></span><span class="icon-file"></span> 文章</li>
                    <li><span class="float-right badge bg-main"><?php echo ($length['cmt']); ?></span><span class="icon-shopping-cart"></span>评论</li>
                    <li><span class="float-right badge bg-main">mysql</span><span class="icon-database"></span> 数据库</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
            <div class="alert">
                <div class="alert alert-yellow"><span class="close"></span><strong>WELCOME:</strong>欢迎来到我的博客后台</div>
                <h4>比你优秀的人比你还努力</h4>
                <p class="text-gray padding-top">如果有人问我：那些艰难的岁月你是怎么熬过来的？ 我想我只有一句话回答：我有一种强大的精神力量支撑着我，这种力量名字叫“想死又不敢”。</p>
            	<a target="_blank" class="button bg-dot icon-code" href="http://www.runoob.com">RUNOOB </a> 
            	<a target="_blank" class="button bg-main icon-download" href="http://www.guaishouxueyuan.net"> 资源下载</a> 
            	<a target="_blank" class="button border-main icon-file" href="https://pixabay.com">图片素材</a>
            </div>
            <div class="panel">
            	<div class="panel-head"><strong>系统信息</strong></div>
                <table class="table">
                    <tr><td width="90" align="right">系统开发：</td><td><a href="#" target="_blank">TP框架</a></td>
                    </tr>
                    <tr>

                        <td align="right">演示：</td><td><a href="#" target="_blank">http://www.lublog.com</a></td>
                    </tr>
                    <tr><td align="right">数据库：</td><td>MySQL</td><td align="right"></tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>