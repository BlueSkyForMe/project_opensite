//前台 ajax 实时获取用户的搜索内容 

$("#s_person").change(function(){

	//获取用户输入的内容
	var inputCode = $(this).val();

	// 书写 ajax, 调用后台数据
    $.get('/home/search/ajax', {"value": inputCode}, function(data){

    	$(".left_con").remove();
      $(".left").append(data);	
     
    }, 'html');

});







































