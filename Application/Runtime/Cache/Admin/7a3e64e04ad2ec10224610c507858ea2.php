<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/simlar.css">
    <script type="text/javascript" src="/Public/Both/jquery.min.js"></script>
</head>
<body>
<div class="music allsame">

    <table >
        <tr class="tab-head">
            <th >标题</th>
            <th>内容地址</th>
            <th>内容配图</th>
            <th>内容摘要</th>
            <th>创建时间</th>
        </tr>

        <!-- 添加循环-->
        <?php if(is_array($musiclist)): $i = 0; $__LIST__ = $musiclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mlist): $mod = ($i % 2 );++$i; $mlisthead = $mlist['head']; $mlistabstract = $mlist['abstract']; $head = substr($mlisthead,0,9); $abstract = substr($mlistabstract,0,18); ?>
            <tr>
                <td><?php echo ($head); ?>...</td>
                <td width="90px"><?php echo ($mlist['textsrc']); ?></td>
                <td width="90px"><?php echo ($mlist['imgsrc']); ?></td>
                <td ><?php echo ($abstract); ?>...</td>
                <td><?php echo ($mlist['addtime']); ?></td>
                    <td><a href="<?php echo U('Music/delete',array('head'=>$mlist['head']));?>">删除</a></td>
                <td>修改</td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

    <div class="all-add"><a href="<?php echo U('Music/addlist');?>">新增</a></div>
    <div class="page"><?php echo ($showpage); ?></div>


</div>
</body>
</html>