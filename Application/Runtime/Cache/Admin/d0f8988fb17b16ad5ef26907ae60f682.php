<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="/Public/Admin/css/myinfo.css">
     <script type="text/javascript" src="/Public/Both/jquery.min.js"></script>
</head>
<body>
    <form action="<?php echo U('Index/myinfo');?>" method="post">

    <div class="my-info">
        <div class="touxiang cansee" ><img src='/Public/Images/<?php echo ($myinfo["head_img"]); ?>' width="250" height="250"></div>
        <ul>
            <li>头像：
                <span class="cansee"><?php echo ($myinfo["head_img"]); ?></span>
                <input class="ishide samesty" name="head_img" style="display: none" type="text" value="<?php echo ($myinfo["head_img"]); ?>">
            </li>
            <li>姓名：
                <span class="cansee"><?php echo ($myinfo["name"]); ?></span>
                <input class="ishide samesty" name="name" style="display: none" type="text" value="<?php echo ($myinfo["name"]); ?>">
            </li>
            <li>性别：
                <span class="cansee"><?php echo ($myinfo["sex"]); ?></span>
                <input class="ishide samesty" name="sex" style="display: none" type="text" value="<?php echo ($myinfo["sex"]); ?>">
            </li>
            <li>年龄：
                <span class="cansee"><?php echo ($myinfo["age"]); ?></span>
                <input class="ishide samesty" name="age" style="display: none" type="text" value="<?php echo ($myinfo["age"]); ?>">            </li>
            <li>爱好：
                <span class="cansee"><?php echo ($myinfo["hobby"]); ?></span>
                <input class="ishide samesty" name="hobby" style="display: none" type="text" value="<?php echo ($myinfo["hobby"]); ?>">
            </li>
            <li>大学：
                <span class="cansee"><?php echo ($myinfo["univer"]); ?></span>
                <input class="ishide samesty" name="univer" style="display: none" type="text" value="<?php echo ($myinfo["univer"]); ?>">
            </li>
        </ul>
        <input type="reset"  class="change button" value="修改" onclick="update()">
        <input type="submit" class="ishide button" style="display: none" value="确定">
    </div>
    </form>
</body>
</html>

<script>
        update = function(){
            $('.change').css('display','none');
            $('.cansee').css("display",'none');
            $('.ishide').css('display','inline');
        }
</script>