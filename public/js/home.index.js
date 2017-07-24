
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



	//===============显示酒店星级=======================

		//用于盛放选择的场地类型的数组
		var typeStar = new Array();

	  $('.starShow').on('click', function(){

	      //如果是选中状态,则添加到类型数组中
	      if($(this).is(":checked"))
	      {
	          t = $(this).val(); 
	          typeStar.push(t);
	      }

	      //如果是取消选中状态,则从数组中删除
	      if($(this).is("input:not(:checked)"))
	      {
	          t = $(this).val();

	          /*  splice(index, howmary) 参数列表: index:从什么位置开始删除; howmary:删除几个!
	              inArray(value, array)  参数列表: value:要查找的值; array:被查找的数组; 返回这个值在数组中的位置
	          */
	          typeStar.splice($.inArray(t, typeStar),1);
	      }

	      //判断酒店是否在搜索数组中, 如果在,则显示酒店星级; 否则不显示酒店星级
	      if($.inArray('酒店', typeStar) != -1)
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








