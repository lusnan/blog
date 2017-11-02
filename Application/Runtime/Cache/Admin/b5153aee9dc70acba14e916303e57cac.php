<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/simlar.css">
    <script type="text/javascript" src="/Public/Both/jquery.min.js"></script>
</head>
<body>
<div class="addlist">
    <form action="<?php echo U('News/add');?>" method="post">
        <label><span>标&nbsp;&nbsp;&nbsp;&nbsp;题  :</span></label><input type="text" name="head" class="add-input">
        <label><span>内容地址:</span></label><input type="text" name="text" class="add-input">
        <label><span>内容图片:</span></label><input type="text" name="img" class="add-input">
        <label><span>内容摘要:</span></label><textarea  name="abstract" class="add-textarea"></textarea>
        <input type="button" id="anadd" value="添加" class="button">
    </form>
</div>
</body>
</html>


<script>
    $('#anadd').click(function(){
        var length = $('input').length;
        console.log(length);
        for(i=0;i<length;++i){
            var flag;
            if($('input').attr('type')== "text"){
                console.log($("input").eq(i).val());
                if($("input").eq(i).val()==''){
                    flag = true;
                }
            }
            if(flag){
                alert('不能为空');
                flag = 0;
                return false;
            }

        }

        alert('添加成功');
        $('#anadd').attr('type','submit');
    });
</script>