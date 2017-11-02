<?php if (!defined('THINK_PATH')) exit();?><!--head头部开始-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>[title]</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/Public/Home/css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--head头部结束-->
<body>

<div class="container">
    <!-- 引入顶部导航 -->
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
        <li class="active"><a href="<?php echo U('Index/index');?>"><span class="glyphicon glyphicon-home"></span>个人主页</a></li>
        <li><a href="<?php echo U('Index/music');?>"><span class="glyphicon glyphicon-music"></span>音乐</a></li>
        <li><a href="<?php echo U('Index/photo');?>"><span class='glyphicon glyphicon-camera'></span>摄影</a></li>
        <li><a href="#contact">PHP</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- 用模态框制作登陆界面 -->
        <li class="active login" data-toggle="modal" data-target="#myModal"><a>登陆</a></li>
      </ul>
      <form class="navbar-form navbar-right" style="margin-right: 120px">
        <input type="text" class="form-control" placeholder="Search...">
      </form>

    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</nav><!-- /.navbar -->
<!-- 顶部导航结束 -->

<!-- 模态框 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content allcont">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div><h2 class="modal-title" id="myModalLabel">登陆</h2></div>
            </div>
            <form class="form-signin">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control login-form" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control login-form" placeholder="Password" required>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me">记住密码
                  </label>
                </div>
                <button class="btn btn-default signtj" type="submit">Log in</button>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


    <!-- 登陆-->
    <div class="login">登陆</div>

    <!-- 引入个人信息栏-->
    <div class="myinfo">
    woshi
</div>

    <!-- 引入左侧列表栏-->
    <!-- 通用左侧列表开始 -->
<div class="col-xs-6 col-sm-4 left" >
	<div class="myinfo  visible-lg">
		<img src="/Public/images/headpic2.jpg">
		<h4>姓名：</h4>
		<h4>爱好：</h4>
		<h4>邮箱：</h4>
	</div>
	<h4> <span class="glyphicon glyphicon-pencil"></span><b>推荐</b></h4>
	<div class="list-group">
		<li href="#" class="list-group-item "><span class="glyphicon glyphicon-list"></span><span class="badge">hot！！</span>Link</li>
		<li href="#" class="list-group-item">Link</li>
		<li href="#" class="list-group-item">Link</li>
		<li href="#" class="list-group-item">Link</li>
		<li href="#" class="list-group-item">Link</li>
		<li href="#" class="list-group-item">Link</li>
		<li href="#" class="list-group-item">Link</li>
		<li href="#" class="list-group-item">Link</li>
		<li href="#" class="list-group-item">Link</li>
		<div class="fresh"><a><span class="glyphicon glyphicon-refresh"></span>刷新</a></div>
	</div>
</div><!--/.sidebar-offcanvas-->
<!-- 通用左侧列表结束 -->


    <!-- 内容栏-->
    <div class="content">
        这是yyue！
    </div>
</div>


</body>
</html>