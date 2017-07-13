@extends('home.layout')

@section('content')

	<!-- 主体main -->
		<div class="main">

			<div class="wrap_column">
				<div class="column">
					<span>首页 > 搜索结果</span>
				</div>
			</div>
			
			<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->
			<div id="bodyer">
				<!-- 搜索栏 -->
				<div class="former">

					<div class="superSearcher">

						<form action="" method="">

							<table>

								<tr class="t_first">
									<td class="title_style" style="padding-right: 8px;">会议规模:</td>
									<td>
										<select name="" id="" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>城市</option>
										</select>
										<select name="" id="" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>人数</option>
											<option>人数不限</option>
											<option>10-50人</option>
											<option>50-100人</option>
											<option>100-300人</option>
											<option>300-500人</option>
											<option>500-1000人</option>
											<option>1000+人</option>
										</select>
										<select name="" id="" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>预算</option>
											<option>3000以下</option>
											<option>3-5千</option>
											<option>5-8千</option>
											<option>8千-1.2万</option>
											<option>1.2万-1.5万</option>
											<option>1.5万-2万</option>
											<option>2万-3万</option>
											<option>3万-5万</option>
											<option>5万-8万</option>
											<option>8万-12万</option>
											<option>12万-20万</option>
											<option>20万-30万</option>
											<option>30万以上</option>
										</select>
									</td>
								</tr>

								<tr class="t_second">
									<td class="title_style">场地类型:</td>
									<td>
										<label><input id="hotel" type="checkbox" name="type[]" value="1">酒店</label>
										<label><input type="checkbox" name="type[]" value="2">会议中心</label>
										<label><input type="checkbox" name="type[]" value="3">体育馆</label>
										<label><input type="checkbox" name="type[]" value="4">展览馆</label>
										<label><input type="checkbox" name="type[]" value="5">酒吧/餐厅/会所</label>
										<label><input type="checkbox" name="type[]" value="6">艺术中心/剧院</label>
										<label><input type="checkbox" name="type[]" value="7">咖啡厅/茶室</label>
										<span>&nbsp;&nbsp;(可多选)</span>
									</td>
								</tr>

								<tr class="t_three">
									<td class="title_style">会议时长:</td>
									<td>
										<select name="" id="" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>会议时长</option>
											<option>一晚</option>
											<option>半天</option>
											<option>一天</option>
											<option>两天</option>
											<option>3-4天</option>
											<option>5-7天</option>
											<option>7-14天</option>
											<option>14天以上</option>
										</select>
										<select name="" id="" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>开始时间</option>
										</select>
									</td>
								</tr>
								
								<tr class="t_four">
									<td class="title_style" style="color: #ccc;">酒店星级:</td>
									<td>
										<label style="color: #ccc;"><input disabled type="radio" name="star" value="1">三星以下</label>
										<label style="color: #ccc;"><input disabled type="radio" name="star" value="2">三星级</label>
										<label style="color: #ccc;"><input disabled type="radio" name="star" value="3">四星级</label>
										<label style="color: #ccc;"><input disabled type="radio" name="star" value="4">五星级</label>
										<label style="color: #ccc;"><input disabled type="radio" name="star" value="5">六星级</label>
										<label style="color: #ccc;"><input disabled type="radio" name="star" value="6">七星级</label>
									</td>
								</tr>

							</table>

							<ul>
								<li>
									<label class="float_l">您已选择 :</label>
								</li>						
							</ul>
						</form>

					</div>

				</div>
				
			<!-- 综合排列 -->
				<div class="content">
					<div class="left">
						<div class="left_tit">
							<select>
							  <option>综合排名</option>
							</select>
							<select>
							  <option>人气</option>
							</select>
							<select>
							  <option>价格</option>
							</select>
							<select>
							  <option>信用度</option>
							</select>
							<span class="float_l inp1"><input type="checkbox" name="slect[]" value="酒店" class="float_l" /><b>酒店</b></span>
							<span class="float_l inp1"><input type="checkbox" name="slect[]" value="含餐点" class="float_l" /><b>含餐点</b></span>
							<span class="float_l inp1"><input type="checkbox" name="slect[]" value="可预订" class="float_l" /><b>可预订</b></span>
						</div>
						
						<!-- 显示搜索出来数据栏 -->
						<div class="left_con">

							@if($data)
								@foreach($data as $key => $val)	

									<div class="left_con_one">
										<ul>
											<li>
												<img src="{{ asset('/images/merchant.png') }}" class="float_one" />
												<div class="left_con_two">
													<div class="left_con_two_tit">
														<span class="span_a" ><a href="{{ url('/home/detail') }}/{{ $val->id }}">{{ $val->userName }}</a></span><br>
														<span class="span_b" >
															@if($val->star != '0')

																{{ $val->star }}酒店  {{ $val->address }}

															@else

																{{ $val->class }}  {{ $val->address }}

															@endif
														</span>
														<span class="span_c"><b>4.8分</b> /5分</span>
													</div>
													<div class="left_con_two_cont">
														<div class="float_cont_l">
															<span class="span_l_a" >会场名称 : 大宴会厅</span><br />
															<span class="span_l_b" >场地面积 : 2000M<sup>2</sup> &nbsp;(50*40*9M)</span><br />
															<span class="span_l_c" >最多容纳人数 : 1000人</span>
															
														</div>
														<div class="float_cont_r">
														<img src="{{ asset('/images/collect.png') }}" class="xin_a" />
															<span class="float_cont_rmb"><sup>¥</sup><b>5万</b>起</span>
														</div>
													</div>
													<div class="left_con_two_bom">
														<div class="left_con_bom">
															
															<div class="b_standard">
																<span>星级酒店</span><span>西式装修</span><span>含餐厅</span>
																<div class="clear"></div>
															</div>
															<span class="pinglun" >总成交量 : 586222单 | 评论 : 35252</span>
														
														</div>
														<div class="left_con_rig">
															<a href="{{ url('/home/detail') }}/{{ $val->id }}" id="Reservations" class="float_r"/><img src="{{ asset('/images/yuding.png') }}"></a>
														</div>
													</div>
												</div>
												
											</li>
											
										</ul>
									</div>

									<div class="gap" style="width: 100%; height: 10px; background: #fff;"></div>

								@endforeach
							@else

								未查到相关信息

							@endif
						</div>
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
										<img width="84" height="60" src="{{ $va->re_image }}" class="right_img" />
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
	

			<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->

		</div>
	<!-- /主体main结束 -->
		
		<div class="clearer"></div>


@endsection

@section('js')
<script>
	var num = 0;
	$('.float_cont_r').find('img').on('click', function(){
		num ++;
		if(num%2 == 1)
		{
			$(this).attr('src', "{{ asset('/images/collect_blue.png') }}");
		}
		else
		{
			$(this).attr('src', "{{ asset('/images/collect.png') }}");
		}
	});
</script>


@endsection