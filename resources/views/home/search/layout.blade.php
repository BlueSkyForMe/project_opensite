@extends('home.layout')

@section('content')

	<!-- 主体main -->
		<div class="main">

			<div class="wrap_column">
				<div class="column">
					<span>首页 > 搜索结果</span>
				</div>
			</div>
				
			<!-- 搜索结果 -->	

			@yield('search')	

			<!-- /搜索结果 -->

			</div>
					
			<!-- 广告栏位 -->
				<div class="right" >
					<div class="right_tit">
						<span>热门场地</span>
					</div>
					
					@if($hot)
						@foreach($hot as $ke => $va)
							<div class="right_con">
								<div class="right_left">
									<img width="84" height="60" src="{{ asset('/uploads/photo') }}/{{ $va->re_image }}" class="right_img" />
								</div>
								<div class="right_rig">
									<span class="right_span_a">{{ $va->re_name }}</span><br>
									<span class="right_span_b">{{ $va->re_type }}</span><br>
									<span class="right_span_c">{{ $va->re_site }}</span>
								</div>
							</div>
						@endforeach
					@endif
					
				</div>
			<!-- /广告栏位 -->
					
			</div>
			<!-- /综合排列 -->

			</div>
			
			<div class="clearer"></div>

			
			<!-- 大图推荐 -->
				<div id="recommend">
					<ul>
						@if($ad)
							@foreach($ad as $k => $v)
								<li>
									<img width="242" height="229" src="{{ asset('/uploads/photo') }}/{{ $v->ad_image }}">
									<div class="explain">
										<div><p class="ex_name">{{ $v->ad_name }}</p></div>
										<div><span>所在地：{{ $v->ad_area }}</span></div>
										<div><span>会场数量：{{ $v->ad_count }} 最大会场面积：{{ $v->ad_site }}平方米</span></div>
										<div><span>最多容纳人数：{{ $v->ad_rencount }}</span></div>
										<div><span>联系电话：{{ $v->ad_phone }}</span></div>
									</div>
								</li>
							@endforeach
						@endif
					</ul>
				</div>
			<!-- /推荐结束 -->	

		</div>
	<!-- /主体main结束 -->
		
		<div class="clearer"></div>


@endsection

@section('js')
<script type="text/javascript">
	
	$('.span_a').each(function(){

		var t = $(this);

		var userName = $(this).find('a').html();

		// alert(userName);

		$.get('/home/search/dq', {"userName": userName}, function(data){

			// alert(data);

			if(data == 1)
			{
				t.parent().next().next().find('.left_con_rig').empty();
				var str = '<a href="#" id="Reservations" class="float_r"/><img src="{{ asset('/images/dangqi_no.png') }}"></a>';
				t.parent().next().next().find('.left_con_rig').append(str);
			}

		}, 'json');


	});


</script>
<script>

	//因为是整段追加,因此绑定事件时需要注意, 寻找第一次加载就存在的类名, 使用on()方式绑定
	//on()事件新用法: on('事件', '绑定对象', '匿名函数')
	$('.content').on('click','.xin_a', function(){

		//$(this)指向的是上一个$
		var t = $(this);

		//获取用户的id 和 企业的 id, 将这些信息存入数据表collect中
		var userID = $('.wrap_ul').find('#userID').val();
		var merchantID = $(this).parent().parent().prev().find('.merid').html();

		//如果用户未登录, 提示登录
		if(userID == undefined)
		{
			alert('如需收藏, 请先登录!');
			return ;
		}

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		//使用ajax将数据传到后台, 查询数据库,如果存在,删除,返回状态码 0; 如果不存在,添加, 返回状态码 1;
		$.post('/home/collect', {"userID": userID, "merchantID": merchantID}, function(data){

			if(data == 1)
			{
				alert('收藏成功');
				
				//收藏, 更换显示样式
				t.attr('src', "{{ asset('/images/collect_blue.png') }}");
			}
			
			if(data == 0)
			{
				alert('取消收藏成功');

				//取消收藏, 更换成普通显示样式
				t.attr('src', "{{ asset('/images/collect.png') }}");
			}

			if(data == 2)
			{
				alert('系统繁忙, 请稍后重试!');
			}



		});

	});
</script>


@endsection