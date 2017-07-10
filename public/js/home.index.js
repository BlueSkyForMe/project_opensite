

	//===============登录功能部分=======================
		$("#login").on('click', function(){
		
			$('#login_box').css('display', 'block');

		});

	//===============注册功能部分=======================
		$("#register").on('click', function(){
		
			$('#register_box').css('display', 'block');


		});

	//==============隐藏所有的下拉菜单====================
		$(".wrap_ul").find('ul').css('display', 'none');

		//当鼠标悬浮某个一级菜单时,显示其下拉菜单, 离开时,隐藏
		$('.wrap_ul>div').hover(function(){

			$(this).css('background', '#fff');
			$(this).find('ul').css('display', 'block');

		}, function(){

			$(this).css('background', '#ccc');
			$(this).find('ul').css('display', 'none');

		});















