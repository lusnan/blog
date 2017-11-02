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
            // 添加分类的链接
            window.location.href = '<?php echo U('Category/addlist');?>';
        });
    });
</script>
<div class="admin">
    <form action="<?php echo U('Category/delmany');?>" method="POST">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>分类列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="cate_id[]" value="全选" />
            <input type="button" id="btnAdd" class="button button-small border-green" value="添加分类"/>
            <input type="submit" class="button button-small border-yellow" value="批量删除" onclick="return confirm('确认全部删除吗?')"/>
        </div>
        <table class="table table-hover">
             <tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="240">分类名称</th>
                <th width="*">分类描述</th>
                <th width="100">操作</th>
            </tr>
            <?php if(is_array($allcate)): $i = 0; $__LIST__ = $allcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                    <td><input type="checkbox" name="cate_id[]" value="<?php echo ($row["cate_id"]); ?>" /></td>
                    <td><?php echo ($row["cate_pid"]); ?></td>
                    <td><?php echo ($row["cate_name"]); ?></td>
                    <td><?php echo ($row["cate_desc"]); ?></td>
                    <td>
                        <a class="button border-blue button-little" 
                        href="<?php echo U('Category/editlist' ,array('cate_id' => $row['cate_id']));?>">
                        修改
                        </a> 
                        <a class="button border-yellow button-little" href="<?php echo U('Category/delete',array('cate_id'=>$row['cate_id']));?>" onclick="return confirm('确认删除吗?')">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            
            
        </table>
    </div>
    </form>
    <br />
    <p class="text-right text-gray" style="float:right">我的博客</p>
</div>
</body>
</html>