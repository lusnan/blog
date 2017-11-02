<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<!-- head头部分开始 -->
<head>
<!--head头部开始-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Myblog</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/Public/Home/css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--head头部结束-->
</head>
<!-- head头部分结束 -->
<body>
<!-- 顶部导航开始 -->
<!-- 顶部导航栏 -->
<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo U('Index/index');?>">卢申南的博客</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="homepage active"><a href="<?php echo U('Index/index');?>"><span class="glyphicon glyphicon-home"></span>主页</a></li>
        <?php if(is_array($cateinfo)): $i = 0; $__LIST__ = $cateinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li><a  href="<?php echo U('Index/category',array('cate_id'=>$row['cate_id']));?>"><?php echo ($row["cate_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- 用模态框制作登陆界面 -->
        <li class="active login" data-toggle="modal" data-target="#login"><a>登陆</a></li>
        <li class="user-info active"><a><?php echo (session('username')); ?></a></li>
        <li class='logout'><a>退出</a></li>
      </ul>

      <form class="navbar-form navbar-right" style="margin-right: 120px"
      method="post" action="<?php echo U('Index/search');?>">
        <input type="text" class="form-control" name='search' placeholder="Search..." value="<?php echo ($statement); ?>">
      </form>

    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</nav><!-- /.navbar -->
<!-- 顶部导航结束 -->

<!-- 登陆模态框 -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content allcont">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div><h2 class="modal-title" id="myModalLabel">登陆</h2></div>
            </div>
            <form class="form-login" method="post" action="<?php echo U('Public/checkLogin');?>">
                <label for="inputEmail" class="sr-only">用户名</label>
                <input type="text" name='login-username' class="form-control login-form" placeholder="用户名" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name='login-password' id="inputPassword" class="form-control login-form" placeholder="密码" required>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me">记住密码
                  </label>
                </div>
                <button class="btn btn-default submitf loginbtn" type="submit">登陆</button>
                <a href="" class="wantlog" data-toggle="modal" data-target="#signup">没有账号？现在注册</a>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- 注册模态框 -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content allcont">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div><h2 class="modal-title" id="myModalLabel">注册</h2></div>
            </div>
            <form class="form-signup">
                <input type="text" name='username' class="form-control signup-form" placeholder="用户名" required>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name='email' id="inputEmail" class="form-control signup-form" placeholder="邮箱" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control signup-form" placeholder="密码" required>
                <div class="row">
                    <div class="col-lg-4">
                        <input type="text" name="captcha" class="form-control signup-form yzm" placeholder="输入验证码">
                    </div>
                    <img src="<?php echo U('Index/captcha');?>" class="code_img" onclick="this.src='<?php echo U('Index/captcha',array('captcha'=>'Math.random()'));?>">
    
                </div>
                
                <button class="btn btn-default submitf signupbtn">立即注册</button>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- 顶部导航结束 -->
<!-- 主体部分开始 -->
<div class="container content-part">
    <div class="row row-offcanvas row-offcanvas-right">
        <!-- 通用左侧列表开始 -->
        <!-- include file="Public/list" / -->
        <!-- 通用左侧列表结束 -->

        <!-- 内容开始 -->
        <div class="col-xs-12 col-md-8 col-md-offset-2 arttop">
    <h1><?php echo ($artinfo["title"]); ?></h1>
    
    <div class="row bottom">
      <div class='col-md-4 author'><span class="glyphicon glyphicon-user" ><?php echo ($artinfo["author"]); ?></div>
      <div class="col-md-4 riqi"><span class="glyphicon glyphicon-calendar" ></span><?php echo ($artinfo["addtime"]); ?></div>
      <div class="col-md-2 "><span class="glyphicon glyphicon-align-center" ></span><span class="cate_id"><?php echo ($artinfo["cate_id"]); ?></span></div>
      <div class="col-md-2 zan" id='<?php echo ($artinfo["art_id"]); ?>'><span class="glyphicon glyphicon-thumbs-up" ></span><span class="zan_num"><?php echo ($artinfo["likes"]); ?></span></div>
      
    </div>
</div>
<div class="col-xs-12 col-md-8 col-md-offset-2 artcon">	
	<?php echo (htmlspecialchars_decode($artinfo["content"])); ?>
</div>
        <!-- 内容结束 -->
        <!-- 引入通用评论开始 -->
        <!-- 通用评论开始 -->
<div class="col-xs-12 col-md-8 col-md-offset-2 downcom">
<div class="otherlink">
    <h2>发布评论</h2>
</div>
<form action="<?php echo U('Article/comment');?>" method="POST">
    <textarea placeholder="说点什么吧…" title="Ctrl+Enter快捷提交" name="content"></textarea>
    <input type="hidden" name="art_id" value="<?php echo ($artinfo["art_id"]); ?>">
    <button type="submit" class="subcom">发布</button>
</form>

<div class="comlist">
    <h2>评论列表</h2>
    <?php if(is_array($cominfo)): $i = 0; $__LIST__ = $cominfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><div class="oncmt">
      <div class="comleft">
        <img  src='/Public/images/userpic.png'>
        <h3>
        <?php echo ($row["cmt_user"]); ?>
        </h3>
      </div>
      <div>
        
        <p class='msg'><?php echo ($row["cmt_content"]); ?>你睡地上分数段分数段复苏的费用核算电费递送方式丢防守对方</p>
        <p class='addtime'>发布时间：<?php echo ($row["cmt_time"]); ?></p>
      </div>
    </div>
    <div style="clear: both;"></div><?php endforeach; endif; else: echo "" ;endif; ?>
       
</div>
</div>

<div class="modal fade" id="nologin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <span>请先登录</span>
</div>

<!-- 通用评论结束 -->

        <!-- 引入通用评论结束 -->

    </div>
    <div class="row">
        <!-- 底部文件开始 -->
        <footer class="row">
  <p>&copy;2017blog</p>
</footer>
        <!-- 通用底部文件结束 -->
    </div>
</div>
<!-- 主体部分结束 -->
    
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="/Public/Home/js/index.js"></script>