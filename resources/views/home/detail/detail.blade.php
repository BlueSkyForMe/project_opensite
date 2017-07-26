@extends('home.layout')

@section('content')

	<!-- 主体main -->
		<div class="min">
			<!--================== 选项栏 ==================-->
			<div class="min_header">
				<div class="header_op">
				@if($user)
					<span class="op_char">首页>场地搜索>{{ $user->userName }}</span>
				@endif
				</div>
			</div>
			<!--================== 显示搜索结果头信息 ==================-->
			<div class="result_header">
				<div class="hotel">
				@if($user)
				
					<span class="hotel_name">{{ $user->userName }}</span>
				@endif
				@if($mer)
					<span class="hotel_site">{{ $mer->address }}</span><br>
				
				
					<span class="hotel_phone">场地类型 : {{ $mer->class }}&nbsp;&nbsp;&nbsp;&nbsp;联系电话 : {{ $mer->phone }}</span>
				
				@endif
				</div>
				<div class="handle">
					<div class="collect">
						<img id="collect" src="{{ asset('/images/collect.png') }}">
					</div>
					<div class="share">
						<img id="share" src="{{ asset('/images/share.png') }}">
					</div>
				</div>	
			</div>
			<!--================== 显示搜索结果选项栏 ==================-->
			<div class="result_option">
				<div class="res_op">
					<span class="res_op_char">会场</span>
				</div>
				<div class="res_op">
					<span class="res_op_char">介绍</span>
				</div>
				<div class="res_op">
				@if($mer)
					<a href="{{ url('/home/pingl/index') }}/{{ $mer->uid }}"><span class="res_op_char">评价</span></a>
				@endif
				</div>
			</div>
			<!--================== 显示搜索结果简介 ==================-->
			<div class="intro">
				<div class="intro_left">
				@if($res)
					<div class="intro_detail">
					

						<p class="detail_num"><span class="det_number">{{ $res->siteNumber }}</span></p>
						<p class="detail_char"><span>会场数量</span></p>
					</div>
					<div class="intro_detail">
						<p class="detail_num"><span class="det_number">{{ $res->maxArea }}</span></p>
						<p class="detail_char2"><span>会场最大面积</span></p>
					</div>
					<div class="intro_detail">
						<p class="detail_num"><span class="det_number">{{ $res->openTime }}</span></p>
						<p class="detail_char3"><span>开业时间</span></p>
					</div>
					<div class="intro_detail">
						<p class="detail_num4"><span class="det_number">{{ $res->guestRoom }}</span></p>
						<p class="detail_char"><span>客房数量</span></p>
					</div>
					<div class="intro_detail">
						<p class="detail_num5"><span class="det_number">{{ $res->maxPerson }}</span></p>
						<p class="detail_char5"><span>容纳人数</span></p>
					</div>
					<div class="intro_detail">
						<p class="detail_num"><span class="det_number">{{ $res->fitmentTime }}</span></p>
						<p class="detail_char6"><span>最近装修</span></p>
					</div>
				
				</div>
				
				<div class="intro_right" style="overflow: hidden;position: relative;width:624px;">
					<ul class="lunbotu" style="width:2496px;position: absolute;">
						@if($merimg)
						@foreach($merimg as $key => $val)
						
						<li style="float: left;"><img width="624px" src="{{ asset('/uploads/images') }}/{{ $val->img }}"></li>
						@endforeach
						@endif
					</ul>
					
				</div>
			</div>



			<!--================== 显示搜索结果详情(三) ==================-->
			<div class="details">
			@if($mee)
				@foreach($mee as $key => $val)
				<div class="details_header">
					<div class="details_header_img">
						<img src="{{ asset('/images/sanjiao.png') }}">
					</div>
					
					<div class="details_header_char" style="cursor: pointer;">
						<span>{{ $val->meetName }}</span>
					</div>

					<div class="details_header_grade">
						<span>4.8分</span><sub>/5分</sub>
					</div>
				</div>

				<div class="detail_wrap" style="display: block;">

					<!-- 用户选择, 加入购物车 -->
						<form action="" method="">
							<input type="hidden" class="id" name="id" value="{{ $res->id }}">
							<div class="details_content">
								<div class="de_con-img">
									<img src="{{ asset('/images/xqztu.png') }}">
								</div>
								<div class="de_con-char">
								
									<p>会场面积: {{ $val->meetArea }}&nbsp;&nbsp;&nbsp;&nbsp;最多容纳人数{{ $val->meetPerson }}</p>
									<p>曾举办活动 : <a href="#">{{ $val->activity }}</a>&nbsp;&nbsp;&nbsp;&nbsp;会场配置 : 会议纸笔、免费茶水、免费wifi</p>
									<p>价格 : <sup style="color:red;">￥</sup><span class="de_con-char_price">{{ $val->meetPrice }}</span><sub style="color:red;">/天</sub></p>				
									<p>会议时长 : <select name="" id="meet">
									<option value="0">请选择</option>
									<option value="1">1天</option>
									<option value="2">2天</option>
									<option value="3">3天</option>
									<option value="4">4天</option>
									<option value="5">5天</option>
									<option value="6">6天</option>
									<option value="7">7天</option>
									</select>

									<p>会议日期 :&nbsp;<input type="text" id="J-xl" placeholder="开始时间" name="startTime" value="" style="width: 80px; height: 25px; margin-right: 14px;"></p>
									<!-- <p>会议日期 : <select name=""><option>请选择</option></select></p> -->
								 
								</div>
								<div class="de_con-tag">
									<p class="de_con_tag_char">场地方正</p>
									<p class="de_con_tag_char">装修精美</p>
									<p style="clear:both;" class="de_con_tag_review">总成交量 : 58622单 | 评论 : 35252</p>
								</div>
							</div>

							<div class="details_options">

								<div class="options_box">

										<div class="box_one">

											<div>会议茶歇: </div>


											<div>
												<select name="restTypes" id="rest">
													<option>类型</option>
													<option value="1">中式</option>
													<option value="2">西式</option>
												</select>
											</div>
										
											<div>
												<select name="" id="restPrice">
													<option>价格</option>
												</select>
											</div>

											<div id="amount0">数量 <div class="add">+</div><div class="num">1</div><div class="reduce">-</div></div>
										</div>


										<div class="box_two">
											<div>会务客房:</div>

											<div>
												<select name="guestType" id="guest">
													<option>类型</option>
													<option value="1">单人间</option>
													<option value="2">标准间(双床)</option>
													<option value="3">双人间</option>
													<option value="4">套间客房</option>
													<option value="5">公寓式客房</option>
													<option value="6">总统套房</option>
													<option value="7">特色客房</option>
												</select>
											</div>

											<div>
												<select name="" id="guestPrice">
													<option>价格</option>
												</select>
											</div>

											<div id="amount1">数量 <div class="add">+</div><div class="num">1</div><div class="reduce">-</div></div>

											<div>

											<!-- <input type="text" id="J-xy" placeholder="开始时间" name="startTime" value="" style="width: 80px; height: 25px; margin-right: 14px;"> -->
												<!-- <select name="" id="">
													<option>请选择</option>
													<option>商家自定</option>
												</select>-->
											</div> 
										</div>


										<div class="box_three">
											
											<div>AV设备:</div>
											<div>
												<select name="" id="av">
													<option>类型</option>
													<option value="1">音响设备</option>
													<option value="2">麦克风</option>
													<option value="3">投影仪</option>
												</select>
											</div>

											<div>
												<select name="" id="avPrice">
													<option>价格</option>
												</select>
											</div>

											<div id="amount2">数量 <div class="add">+</div><div class="num">1</div><div class="reduce">-</div></div>

											<div>
											<!-- 使用时长&nbsp; -->
												<!-- <input type="text" id="J-xa" placeholder="开始时间" name="startTime" value="" style="width: 80px; height: 25px; margin-right: 14px;"> -->
											<!-- 
												<select name="" id="">
													<option>请选择</option>
													<option>商家自定</option>
												</select>-->
											</div>

										</div>
										
								</div>	

								<div><img class="go" src="{{ asset('/images/add.png') }}" ></div>
							</div>
						</form>
				
					<!-- /用户选择, 加入购物车结束  -->
				</div>
				@endforeach
				@endif
				@endif
			</div>


			<!--================== 用户评论 ==================-->
			<div id="review">
			@if($comment)
				@foreach($comment as $key => $val)
				<div class="review_header">
					<p><span class="re_de">评论详情(325321)</span> &nbsp;场地总评分<span style="color: red;">4.7</span>分, 共23586次打分</p>
				</div>
				<!-- 评论内容 (遍历数据库)-->
				
				<!--此处不该有，为展示页面添加，后期遍历数据库时，删除此段-->
				<!-- 评论内容 (遍历数据库)-->
				
				 <!-- 评论内容 (遍历数据库) -->
				<div class="review_contents">
					<div class="photo"><img src="{{ asset('/images/photo.png') }}"><p>BUEOIKFKJ</p></div>
					<div class="con">
						<div><p>{{ $val->pl_content }}</p></div>
						<div><img src="{{ asset('/images/re.png') }}"></div>
						<div class="con_type"><span>所用场地：{{ $val->pl_site }} 会议人数：200 会议类型：新闻发布会</span></div>
					</div>
				</div>
				<!--======================================================-->
				<!-- 更多详情 -->
				@endforeach
				@endif
				<div id="more"><a href="#"><span>更多评论详情</span></a></div>
				
			</div>
			<!-- /评论结束 -->

			<!-- 大图推荐 -->
				<div id="recommend">
					<ul>
						@if($ad)
							@foreach($ad as $k => $v)
								<li>
									<img width="242" height="229" src="{{ $v->ad_image }}">
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
	<!-- /主体结束 -->

		
	<div class="clearer"></div>


@endsection

@section('js')

<script type="text/javascript">

// =============轮播图===============================
		var os = '-';
        var inte = null;
        
        setInterval(function(){
                // 获取 left
                var left = $('.lunbotu').position().left;
                
                
                // 判断
                if(left <= -1872)
                {
                    os = '+';
                    // console.log('ok');
                }

                if(left >= 0)
                {
                    os = '-';
                    // console.log(os);
                }

                $('ul').animate({
                    'left': os+'=624px'
                }, 1000);

            }, 3000);


// ===============点击会议时长================================


	$('#meet').on('change', function(){

		var value = $(this).val();

		// alert(value);

		$.get('/home/details/ajax', {"meet": value}, function(data){

			// alert(data);
		},'json');

	});


// ===============点击会议日期================================

	$('.go').on('click', function(){

		// alert('ok');
		var id = $(".id").val();
		// alert(id);
		var restcount = $("#amount0").find(".num").html();
		var guestcount = $("#amount1").find(".num").html();
		var avcount = $("#amount2").find(".num").html();
		var value = $("#J-xl").val();
		// alert(value);
		var meet = $("#meet").val();
		var rest = $("#rest").val();
		var guest = $("#guest").val();
		var av = $("#av").val();

		// alert(id);
		$.get('/home/details/insert', {id:id, meet:meet, meeting:value, rest:rest, guest:guest, av:av, restcount:restcount, guestcount:guestcount, avcount:avcount}, function(data){

			if(data == 0)
			{
				alert('你还未登录,请登录后再来');location.href='/home/index';
			}else if(data == 1)
			{
				alert('恭喜你添加购物车成功,');location.href='/home/order/myOrder';
			}else if(data == 2)
			{
				alert('你还没选择会议日期,请选择后在提交');location.href='/home/index';
			}

		}, 'json');

	});


//=============点击大宴会厅,收起或放下内容=============
	var flag = null;

	$('.details_header_char').on('click', function(){

		flag = $(this).parent().next().css('display');

		if(flag === 'none')
		{

			$(this).parent().next().css('display', 'block');
			$(this).prev().find('img').attr('src', "{{ asset('/images/sanjiao.png') }}");

		}
		else
		{
			$(this).parent().next().css('display', 'none');
			$(this).prev().find('img').attr('src', "{{ asset('/images/jiaobiao.png') }}");
		}

	});


// =======================点击茶歇,============================

		$('#rest').on('change', function(){

			// alert('ok');
			var value = $(this).val();
			// alert(value);
			$.get('/home/details/ajax', {"value": value}, function(data){

				// alert(data);
				$('#restPrice').find('option').remove();
				$('#restPrice').append("<option>"+ data +"</option>");

			}, 'json');
		
		});

// ===========点击客房=============	

	$('#guest').on('change',function(){

		var value = $(this).val();
		// alert(value);
		$.get('/home/details/ajax',{"guest": value},function(data){

			$('#guestPrice').find('option').remove();
			$('#guestPrice').append("<option>"+ data +"</option>");

		}, 'json');

	});


// ==========点击设备时======================

	$('#av').on('change', function(){

		var value = $(this).val();

		$.get('/home/details/ajax', {"av": value}, function(data){

			$('#avPrice').find('option').remove();
			$('#avPrice').append("<option>"+ data +"</option>");

		}, 'json');

	});



// ===============数量点击事件================================

	$('.add').on('click', function(){

		var value = $(this).next().html();

		value ++;

		$(this).next().html(value);

	});

	$('.reduce').on('click', function(){
		var value = $(this).prev().html();

		if(value > 1)
		{
			value --;
		}
		$(this).prev().html(value);

	});

</script>

@endsection
