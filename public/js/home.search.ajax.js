//前台 ajax 实时获取用户的搜索内容 
var type = new Array();


//=========================人数选择=============================
  $("#s_person").change(function(){

  	//获取用户输入的内容
  	var inputCode = $(this).val();

  	// 书写 ajax, 调用后台数据
      $.get('/home/search/ajax', {"value": inputCode}, function(data){

      	$(".left_con").remove();
          $(".left").append(data);	
       
      }, 'html');

  });

//=========================预算选择=============================
  $("#s_budget").change(function(){

      //获取用户输入的内容
      var inputCode = $(this).val();

      // 书写 ajax, 调用后台数据
      $.get('/home/search/ajax', {"budget": inputCode}, function(data){

          $(".left_con").remove();
          $(".left").append(data);  
       
      }, 'html');

  });

//=======================场地类型选择===========================
  $('.siteType').on('click', function(){

      //如果是选中状态,则添加到类型数组中
      if($(this).is(":checked"))
      {
          t = $(this).val(); 
          type.push(t);
      }

      //如果是取消选中状态,则从数组中删除
      if($(this).is("input:not(:checked)"))
      {
          t = $(this).val();

          /*  splice(index, howmary) 参数列表: index:从什么位置开始删除; howmary:删除几个!
              inArray(value, array)  参数列表: value:要查找的值; array:被查找的数组; 返回这个值在数组中的位置
          */
          type.splice($.inArray(t, type),1);
      }

      //判断酒店是否在搜索数组中, 如果在,则显示酒店星级; 否则不显示酒店星级
      if($.inArray('酒店', type) != -1)
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

      //书写 ajax, 调用后台数据
      $.get('/home/search/ajax', {"class": type}, function(data){

          $(".left_con").remove();
          $(".left").append(data);  

          }, 'html');
      });

//=======================会议时长选择===========================
  // $("#s_meeting").change(function(){

  //     //获取用户输入的内容
  //     var inputCode = $(this).val();

  //     // 书写 ajax, 调用后台数据
  //     $.get('/home/search/ajax', {"meeting": inputCode}, function(data){

  //         $(".left_con").remove();
  //         $(".left").append(data);  
       
  //     }, 'html');

  // });

//=======================酒店星级选择===========================
  //星级 (三星以下)
  $("#zone").on("click", function(){

    //获取用户输入的内容
    if($(this).is(":checked"))
    {
        // 书写 ajax, 调用后台数据
        $.get('/home/search/ajax', {"star": '0'}, function(data){

           $(".left_con").remove();
           $(".left").append(data);  
       
      }, 'html');

    }
  });

  //星级 (三星)
  $("#star_three").on("click", function(){

    //获取用户输入的内容
    if($(this).is(":checked"))
    {
        // 书写 ajax, 调用后台数据
        $.get('/home/search/ajax', {"star": '三星级'}, function(data){

           $(".left_con").remove();
           $(".left").append(data);  
       
      }, 'html');

    }
  });

  //星级 (四星)
  $("#star_foue").on("click", function(){

    //获取用户输入的内容
    if($(this).is(":checked"))
    {
        // 书写 ajax, 调用后台数据
        $.get('/home/search/ajax', {"star": '四星级'}, function(data){

           $(".left_con").remove();
           $(".left").append(data);  
       
      }, 'html');

    }
  });

  //星级 (五星)
  $("#star_five").on("click", function(){

    //获取用户输入的内容
    if($(this).is(":checked"))
    {
        // 书写 ajax, 调用后台数据
        $.get('/home/search/ajax', {"star": '五星级'}, function(data){

           $(".left_con").remove();
           $(".left").append(data);  
       
      }, 'html');

    }
  });

  //星级 (六星)
  $("#star_six").on("click", function(){

    //获取用户输入的内容
    if($(this).is(":checked"))
    {
        // 书写 ajax, 调用后台数据
        $.get('/home/search/ajax', {"star": '六星级'}, function(data){

           $(".left_con").remove();
           $(".left").append(data);  
       
      }, 'html');

    }
  });

  //星级 (七星)
  $("#star_seven").on("click", function(){

    //获取用户输入的内容
    if($(this).is(":checked"))
    {
        // 书写 ajax, 调用后台数据
        $.get('/home/search/ajax', {"star": '七星级'}, function(data){

           $(".left_con").remove();
           $(".left").append(data);  
       
      }, 'html');

    }
  });

//=======================查询结果排序===========================

    //人气
    $('#s_popularity').on('change', function(){

        //获取下拉选择
        var value = $(this).val();

        // 书写 ajax, 调用后台数据
        $.get('/home/search/ajax', {"s_popular": value}, function(data){

            $(".left_con").remove();
            $(".left").append(data);  
           
          }, 'html');

    });

    //价格
    $('#s_price').on('change', function(){

        //获取下拉选择
        var value = $(this).val();

        // 书写 ajax, 调用后台数据
        $.get('/home/search/ajax', {"s_price": value}, function(data){

            $(".left_con").remove();
            $(".left").append(data);  
           
          }, 'html');

    });





