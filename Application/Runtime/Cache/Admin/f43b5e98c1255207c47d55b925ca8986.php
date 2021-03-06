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
  <div class="tab">
    <div class="tab-head"> <strong>站长管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">站长信息</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="<?php echo U('Master/edit');?>" >
          <div class="form-group">
            <div class="label">
              <label for="sitename">姓名</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="nickname" name="nickname" size="50" placeholder="站长姓名" data-validate="required:请填写站长姓名" value="<?php echo ($masterInfo["mastname"]); ?>" />
            </div>
          </div>
          
          <div class="form-group">
            <div class="label">
              <label for="siteurl">爱好</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="job" name="job" size="50" placeholder="请填写您的爱好" data-validate="required:请填写您的爱好" value="<?php echo ($masterInfo["hobbys"]); ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">微信</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="address" name="home" size="50" placeholder="请填写您的微信" data-validate="required:请填写您的微信" value="<?php echo ($masterInfo["wechat"]); ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">电话</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="tel" name="tel" size="50" placeholder="请填写您的电话" data-validate="required:请填写您的电话" value="<?php echo ($masterInfo["tel"]); ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">邮箱</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="email" name="email" size="50" placeholder="请填写您的邮箱" data-validate="required:请填写您的邮箱" value="<?php echo ($masterInfo["email"]); ?>" />
            </div>
          </div>
          <div class="form-button">
            <button name="submit" class="button bg-main" type="submit">提交</button>
          </div>
          <input type='hidden' name='id' value="<?php echo ($masterInfo["id"]); ?>">
        </form>
      </div>
    </div>
  </div>
    <div style='height:40px; border-bottom:1px #DDD solid'></div>
    <p class="text-right text-gray" style="float:right">我的博客</p>
</div>