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
					<a href="{{ url('/home/pingl/index') }}"><span class="res_op_char">评价</span></a>
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
				@endif
				</div>
				<div class="intro_right">
					<img src="{{ asset('/images/replace_img.gif') }}">
				</div>
			</div>



			<!--================== 显示搜索结果详情(三) ==================-->
			<div class="details">
				<div class="details_header">
					<div class="details_header_img">
						<img src="{{ asset('/images/sanjiao.png') }}">
					</div>
					@if($mee)
					<div class="details_header_char" style="cursor: pointer;">
						<span>{{ $mee->meetName }}</span>
					</div>

					<div class="details_header_grade">
						<span>4.8分</span><sub>/5分</sub>
					</div>
				</div>

				<div class="detail_wrap" style="display: block;">

					<!-- 用户选择, 加入购物车 -->
						<form action="" method="">
							<div class="details_content">
								<div class="de_con-img">
									<img src="{{ asset('/images/xqztu.png') }}">
								</div>
								<div class="de_con-char">
								
									<p>会场面积: {{ $mee->meetArea }}&nbsp;&nbsp;&nbsp;&nbsp;最多容纳人数{{ $mee->meetPerson }}</p>
									<p>曾举办活动 : <a href="#">{{ $mee->activity }}</a>&nbsp;&nbsp;&nbsp;&nbsp;会场配置 : 会议纸笔、免费茶水、免费wifi</p>
									<p>价格 : <sup style="color:red;">￥</sup><span class="de_con-char_price">{{ $mee->meetPrice }}</span><sub style="color:red;">/天</sub></p>				
									<p>会议时长 : <select name=""><option>请选择</option></select> , 共____天</p>
									<p>会议日期 : <select name=""><option>请选择</option></select></p>
								@endif
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
												<select name="" id="">
													<option>类型</option>
													<option>中式</option>
													<option>西式</option>
												</select>
											</div>

											<div>
												<select name="" id="">
													<option>价格</option>
													<option>中式</option>
													<option>西式</option>
												</select>
											</div>

											<div id="amount0">数量 <div class="add">+</div><div class="num">1</div><div class="reduce">-</div></div>
										</div>


										<div class="box_two">
											<div>会务客房:</div>

											<div>
												<select name="" id="">
													<option>类型</option>
													<option>单人间</option>
													<option>标准间(双床)</option>
													<option>双人间</option>
													<option>套间客房</option>
													<option>公寓式客房</option>
													<option>总统套房</option>
													<option>特色客房</option>
												</select>
											</div>

											<div>
												<select name="" id="">
													<option>价格</option>
													<option>商家自定</option>
												</select>
											</div>

											<div id="amount1">数量 <div class="add">+</div><div class="num">1</div><div class="reduce">-</div></div>

											<div>入/离时间
												<select name="" id="">
													<option>请选择</option>
													<option>商家自定</option>
												</select>
											</div>
										</div>


										<div class="box_three">
											
											<div>AV设备:</div>
											<div>
												<select name="" id="">
													<option>类型</option>
													<option>音响设备</option>
													<option>麦克风</option>
													<option>投影仪</option>
												</select>
											</div>

											<div>
												<select name="" id="">
													<option>价格</option>
													<option>商家自定</option>
												</select>
											</div>

											<div id="amount2">数量 <div class="add">+</div><div class="num">1</div><div class="reduce">-</div></div>

											<div>使用时长&nbsp;
												<select name="" id="">
													<option>请选择</option>
													<option>商家自定</option>
												</select>
											</div>

										</div>
										
								</div>	

								<div class="go"><a href="#"><img src="{{ asset('/images/add.png') }}" ></a></div>
							</div>
						</form>
					<!-- /用户选择, 加入购物车结束  -->
				</div>
			</div>


			<!--================== 用户评论 ==================-->
			<div id="review">
				<div class="review_header">
					<p><span class="re_de">评论详情(325321)</span> &nbsp;场地总评分<span style="color: red;">4.7</span>分, 共23586次打分</p>
				</div>
				<!-- 评论内容 (遍历数据库)-->
				<div class="review_contents">
					<div class="photo"><img src="{{ asset('/images/photo.png') }}"><p>BUEOIKFKJ</p></div>
					<div class="con">
					
						<div><p>房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适,房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适</p></div>
						<div><img src="{{ asset('/images/re.png') }}"></div>
						<div class="con_type"><span>所用场地：第一会议室 会议人数：200 会议类型：新闻发布会</span></div>
					
					</div>
				</div>
				<!--此处不该有，为展示页面添加，后期遍历数据库时，删除此段-->
				<!-- 评论内容 (遍历数据库)-->
				<div class="review_contents">
					<div class="photo"><img src="{{ asset('/images/photo.png') }}"><p>BUEOIKFKJ</p></div>
					<div class="con">
						<div><p>房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适,房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适</p></div>
						<div><img src="{{ asset('/images/re.png') }}"></div>
						<div class="con_type"><span>所用场地：第一会议室 会议人数：200 会议类型：新闻发布会</span></div>
					</div>
				</div>
				<!-- 评论内容 (遍历数据库)-->
				<div class="review_contents">
					<div class="photo"><img src="{{ asset('/images/photo.png') }}"><p>BUEOIKFKJ</p></div>
					<div class="con">
						<div><p>房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适,房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适</p></div>
						<div><img src="{{ asset('/images/re.png') }}"></div>
						<div class="con_type"><span>所用场地：第一会议室 会议人数：200 会议类型：新闻发布会</span></div>
					</div>
				</div>
				<!--======================================================-->
				<!-- 更多详情 -->
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

</script>

@endsection