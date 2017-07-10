
	//===============登录功能部分=======================
		$("#login").on('click', function(){
		
			$('#login_box').css('display', 'block');

		});

	//===============注册功能部分=======================
		$("#register").on('click', function(){
		
			$('#register_box').css('display', 'block');


		});

	//===============关闭登录注册=======================
		$(".closer").on('click', function(){

			$('#login_box').css('display', 'none');
			$('#register_box').css('display', 'none');

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

	//===============显示高级搜索=======================
		function superSearch()
		{
			$("#super_sear").on('click', function(){

				 $(".superSearcher").css('display', 'block');

				 $('#super_img').css('display', 'none');
				 $('#super_sear').css('display', 'none');
			});
		}

	//===============高级搜索酒店=======================
		var number = 0;
		$("#hotel").on('click', function(){

			number ++;
			if(number%2 == 1)
			{
				$(".t_four").find('input').removeAttr('disabled');
				$(".t_four").find('label').css('color', '#333');
				$(".t_four").find('.title_style').css('color', '#333');
			}
			else
			{
				$(".t_four").find('input').attr('disabled', 'disabled');
				$(".t_four").find('label').css('color', '#ccc');
				$(".t_four").find('.title_style').css('color', '#ccc');
			}

		});











