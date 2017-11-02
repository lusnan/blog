$(window).ready(function(){
	/* ---------------------------------------------- /*
	 * 左侧折叠菜单
	/* ---------------------------------------------- */
	$('.treeview-header').click(function(){
		//为当前选中选项添加选中样式
		$('.sidebar-menu').find('.active').removeClass('active');
		$(this).addClass('active');

		// //为当前选中选项切换折叠按钮
		$(this).parent().siblings().find('.pull-right-container').removeClass('minus-icon');
		//为当前选中选项伸缩菜单
		$(this).siblings().slideToggle(500,function(e){
			var state=$(this).css('display');
			if(state=='block'){
				$(this).siblings().find('.pull-right-container').addClass('minus-icon');
			}else{
				$(this).siblings().find('.pull-right-container').removeClass('minus-icon');
			}		
		});
		$(this).parent().siblings().find('.treeview-menu').slideUp();		
	});

	$('.treeview-menu li a').click(function(){
		
		$('.treeview-menu').find('a').removeClass('active');
		$(this).addClass('active');
	});
	$('.dishes-sale-item button').click(function(event) {
		$(this).parents('.sale-item-head').siblings('.dishes-sale-info').slideToggle();
	});
});

//退出动作
function loginout(){
	var msg = confirm("确定要退出？");
	if(msg == true){
		$.ajax({
			type:"get",
			url:"/index.php/admin/Index/loginout",
			async:true,
			dataType:"json",
			success:function(data){
				// if(data.code == 0){
				alert(data.msg);
				location.href = "/index.php/admin/Index/login";
				// }else{
				// 	location.href = "/index.php/home/checkstand/admin_login";
				// }
			}
		});
	}
}

