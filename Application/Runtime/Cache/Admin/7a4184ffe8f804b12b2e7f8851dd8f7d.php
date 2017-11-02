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
<script>
	//定义页面载入事件
	$(function(){
		//获取btnAdd按钮
		$('#btnAdd').bind('click',function(){
			// 设置“添加文章”链接
			window.location.href = '<?php echo U('Article/addlist');?>';
		});
	});
    //定义页面载入事件
    $(function(){
        //获取btnAdd按钮
        $('#btnRecycle').bind('click',function(){
            // 设置“回收站”链接
            window.location.href = '<?php echo U('Article/recyclelist');?>';
        });
    });
</script>
<div class="admin">
	<form action="<?php echo U('Article/delmany');?>" method="POST">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>文章列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="art_id[]" value="全选" />
            <input type="button" id="btnAdd" class="button button-small border-green" value="添加文章" />
            <input type="submit" class="button button-small border-yellow"  value="批量删除" onclick=" return confirm('确认全部删除吗?')" />
            <input type="button" id="btnRecycle" class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="200">文章标题</th>
                <th width="120">赞数</th>
                <th width="180">发布时间</th>
                <th width="100">操作</th>
            </tr>
            <?php if(is_array($allart)): $i = 0; $__LIST__ = $allart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                <!-- name值应为数组形式，不然会被覆盖 -->
                <td><input type="checkbox" name="art_id[]" value="<?php echo ($row["art_id"]); ?>" /></td>
                <td><?php echo ($row["cate_name"]); ?></td>
                <td><?php echo (substr($row["title"],0,48)); ?></td>
                <td><?php echo ($row["likes"]); ?></td>
                <td><?php echo ($row["addtime"]); ?></td>
                
                <td>
                    <a class="button border-blue button-little" href="<?php echo U('Article/editlist',array('art_id'=>$row['art_id']));?>">修改</a> 
                    <a class="button border-yellow button-little" href="<?php echo U('Article/delete',array('art_id'=>$row['art_id']));?>" onclick="return confirm('确认删除吗?')">删除</a>
                </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
		<div class="panel-foot text-center">
            <?php echo ($showpage); ?> 
        </div>
    </div>
    </form>
    <br />
    <p class="text-right text-gray" style="float:right">我的博客</p>
</div>
</body>
</html>