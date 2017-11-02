
$(function(){

	//判断是否是登陆状态
	var userinfo = $('.user-info').text();
	if(userinfo == ''){
		//为空则为未登录
		//隐藏退出栏
		$('.logout,.user-info').css('display','none');
	}else{
		$('.login').css('display','none');
	}


	//注册时隐藏登陆界面
	$('.wantlog').click(function(){
		$('#login').modal('hide');
	})

	//登陆验证
	$('.loginbtn').click(function(evet){
		evet.preventDefault();
	    var username = $("input[name='login-username']").val();
	    var password =  $("input[name='login-password']").val();  
	    if(username && password){
	      $.ajax({
	        type:"POST",
	        url:'http://lublog.com/index.php/Home/Public/checkLogin',
	        async:true,         //是否是异步请求
	        data:{"username":username,"password":password},
	        dataType:"json",
	        success:function(data){
	          if(data.code != 1){
	            alert(data.msg);
	          }else{
	            alert('登陆成功！') ;
	            window.location.href = "/index.php/home/index";
	          }
	        }
	      });
	    }else{
	      alert("用户名和密码不能为空！");
	    }
	  
	})	


    //注册验证
	$('.signupbtn').click(function(evet){
		evet.preventDefault();
	    var username = $("input[name='username']").val();
	    var captcha =  $("input[name='captcha']").val();
	    var email = $("input[name='email']").val();
	    var password  = $("input[name='password']").val();
	    if(username && captcha){
	      $.ajax({
	        type:"POST",
	        url:'http://lublog.com/index.php/Home/Public/signup',
	        async:true,         //是否是异步请求
	        data:{"username":username,"captcha":captcha,"email":email,"password":password},
	        dataType:"json",
	        success:function(data){
	          if(data.code != 1){
	            alert(data.msg);
	            $(".code_img").trigger('click');      //触发验证码刷新
	            //$("#reset").trigger('click');         //触发
	          }else{
	            alert('注册成功！') ;
	            window.location.href = "";
	          }
	        }
	      });
	    }else{
	      alert("用户名和验证码不能为空！");
	    }
	  
	})


	//退出操作
	$('.logout').click(function(){
		var msg = confirm("确定要退出？");
		if(msg == true){
			$.ajax({
				type:"get",
				url:"/index.php/Home/Public/logout",
				async:true,
				dataType:"json",
				success:function(data){
					// if(data.code == 0){
					alert(data.msg);
					location.href = "";
					// }else{
					// 	location.href = "/index.php/home/checkstand/admin_login";
					// }
				}
			});
		}
	})

	//添加分类名称
    $('.cate_id:contains(1)').text('音乐');
    $('.cate_id:contains(2)').text('电影');
    $('.cate_id:contains(3)').text('PHP');


    //点赞功能
    $('.zan').click(function(){
    	var color = $(this).css('color');
    	var art_id = $(this).attr('id'); //获取文章id值
    	if( color == 'rgb(246, 8, 8)'){
    		$(this).css('color','#121212');
    		$(this)[0].lastChild.innerHTML-- ; 
    		var zannum = $(this)[0].lastChild.innerHTML;   		 

    	}else{
    		$(this).css('color','#F60808');
    		$(this)[0].lastChild.innerHTML++ ;
    		var zannum = $(this)[0].lastChild.innerHTML ;
    	}
    	$.ajax({
				type:"get",
				url:"/index.php/Home/Article/zannums",
				async:true,
				data:{'art_id': art_id,'zannum':zannum},
				dataType:"json",
		});
    })

    //未登陆禁止评论
    $('.subcom').click(function(evet){

    	if(userinfo == ''){
			//为空则为未登录
			evet.preventDefault();
			alert('请登陆再评论！');
    	}else{
    		$(this).submit();
    	}
    })	

		
})








