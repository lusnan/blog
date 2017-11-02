<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="/Public/Admin/css/login.css">
  <script type="text/javascript" src="/Public/js/jquery.min.js"></script>
  <title>lublog后台登录</title>  
</head>
<body>
    <div class="login_head">
      <h1 >
        <span>博客后台</span>
      </h1>
    </div>

    <div class="login_content">

      <form id="myform">
          <div class="login_main">
              <h3 class="main_head">欢迎登录</h3>
              <input type="text" name="adminer_name" value="<?php echo ($adminer_name); ?>" class="form_list login_input" placeholder="用户名">
              <input type="password" name="password" value="<?php echo ($password); ?>" class="form_list login_input" placeholder="密码">

              <div class="code_content">
                <input type="text" name="captcha" class="form_list captcha_input " placeholder="验证码">
                <img src="/index.php/Admin/Index/captcha" class="code_img" onclick="this.src='/index.php/Admin/Index/captcha/'+Math.random()">

              </div>
              <?php if($autoFlag == 1): ?><input type="checkbox" value="1" name="autoFlag" checked="checked"/>&nbsp;记住密码
                <?php else: ?>
                <input type="checkbox" value="1" name="autoFlag"/>&nbsp;记住密码<?php endif; ?>
              <button class="form_list login_btn" type="button" id="loginBtn" onclick="commit()">登录</button>
              <input type="reset" id="reset" style="display: none;"/>
          </div>
      </form>
    </div>
</body>
<script>
  function commit(){
    var adminer_name = $("input[name='adminer_name']").val();
    var password = $("input[name='password']").val();
    var captcha =  $("input[name='captcha']").val();
    var autoFlag = $("input[type='checkbox']").is(':checked');    
    //var login_way = 0;     //登录入口(0:从后台路径登录，1：从收银端登录)
    if(autoFlag == true){
      autoFlag = 1;
    }else{
      autoFlag = 0;
    }
    if(adminer_name && password){
      $.ajax({
        type:"POST",
        url:"/index.php/Admin/Index/checklogin",
        async:true,         //是否是异步请求
        data:{"adminer_name":adminer_name,"password":password,"captcha":captcha,"autoFlag":autoFlag,},
        dataType:"json",
        success:function(data){
          if(data.code != 1){
            alert(data.msg);
            $(".code_img").trigger('click');      //触发验证码刷新
            //$("#reset").trigger('click');         //触发
          }else{
            //sessionStorage.setItem("id",data.id);
            top.location.href = "/index.php/admin/index"; 
          }
        }
      });
    }else{
      alert("用户名和密码不能为空！");
    }
  }



</script>
</html>