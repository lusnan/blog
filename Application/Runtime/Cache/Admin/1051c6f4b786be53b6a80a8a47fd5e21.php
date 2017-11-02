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
                        <li><a href="<?php echo U('Category/index');?>">单页管理</a></li>
                        <li><a href="<?php echo U('Master/index');?>">站长管理</a></li>
                        <li><a href="<?php echo U('Category/index');?>">友情链接</a></li>
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
    <div class="tab-head"> <strong>分类管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">添加分类</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="POST" class="form-x" action="<?php echo U('Category/add');?>">
          <div class="form-group">
            <div class="label">
              <label for="sitename">分类名称</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="name" name="cate_name" size="50" placeholder="分类名称" data-validate="required:请填写您的分类名称" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="sitename">所属类别</label>
            </div>
            <div class="field">
              <select class="select" name="cate_pid" >
              	  <option value="0">主类别</option>
                  <?php if(is_array($cateinfo)): $i = 0; $__LIST__ = $cateinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($row["cate_id"]); ?>" ><?php echo ($row["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    
                 
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">分类描述</label>
            </div>
            <div class="field">
              <textarea name="cate_desc" class="input" rows="5" cols="50" placeholder="请填写分类描述" data-validate="required:请填写分类描述"></textarea>
            </div>
          </div>
          
          <div class="form-button">
            <button class="button bg-main" type="submit">提交</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div style='height:20px; border-bottom:1px #DDD solid'></div>
  <p class="text-right text-gray" style="float:right">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html>