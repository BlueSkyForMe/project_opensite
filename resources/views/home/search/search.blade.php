@extends('home.search.layout')

@section('search')

			<div id="bodyer">
				<!-- 搜索栏 -->
				<div class="former">

					<div class="superSearcher">

						<form action="" method="">
							
							<table>

								<tr class="t_first">
									<td class="title_style" style="padding-right: 8px;">会议规模:</td>
									<td>
						
										<!-- 城市选择 -->
										<input type="text" placeholder=" 城 市 " id="destination" style="width: 80px; height: 25px; margin-right: 14px;" name="city" value="{{ session('city') }}">
										<div id="in_city" style="display: none; position:absolute; top: 64px; left: -292px;"></div>
										
										<select name="s_person" id="s_person" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>
												@if(session('supPerson'))
												
													@if(session('supPerson') == 50)
														10-50
													@endif

													@if(session('supPerson') == 100)
														50-100
													@endif

													@if(session('supPerson') == 300)
														100-300
													@endif

													@if(session('supPerson') == 500)
														300-500
													@endif

													@if(session('supPerson') == 1000)
														500-1000
													@endif

												@else
													人数不限
												@endif
											</option>
											<option>人数不限</option>
											<option>10-50</option>
											<option>50-100</option>
											<option>100-300</option>
											<option>300-500</option>
											<option>500-1000</option>
											<!-- <option>1000+</option> -->
										</select>
										<select name="s_budget" id="s_budget" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>
												@if(session('budget'))

													@if(session('budget') == 3000)
														3000以下
													@endif

													@if(session('budget') == 5000)
														3-5千
													@endif

													@if(session('budget') == 8000)
														5-8千
													@endif

													@if(session('budget') == 12000)
														8千-1.2万
													@endif

													@if(session('budget') == 15000)
														1.2万-1.5万
													@endif

													@if(session('budget') == 20000)
														1.5万-2万
													@endif

													@if(session('budget') == 30000)
														2万-3万
													@endif

													@if(session('budget') == 50000)
														3万-5万
													@endif

													@if(session('budget') == 80000)
														5万-8万
													@endif

													@if(session('budget') == 120000)
														8万-12万
													@endif

													@if(session('budget') == 200000)
														12万-20万
													@endif

													@if(session('budget') == 300000)
														20万-30万
													@endif

													@if(session('budget') == 300000000)
														30万以上
													@endif

													@if(session('budget') == 30000000)
														不限预算
													@endif

												@else
													不限预算
												
												@endif

											</option>
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
										<label><input class="siteType" type="checkbox"  name="type[]" value="酒店">酒店</label>
										<label><input class="siteType" type="checkbox" name="type[]" value="会议中心">会议中心</label>
										<label><input class="siteType" type="checkbox" name="type[]" value="体育馆">体育馆</label>
										<label><input class="siteType" type="checkbox" name="type[]" value="展览馆">展览馆</label>
										<label><input class="siteType" type="checkbox" name="type[]" value="酒吧/餐厅/会所">酒吧/餐厅/会所</label>
										<label><input class="siteType" type="checkbox" name="type[]" value="艺术中心/剧院">艺术中心/剧院</label>
										<label><input class="siteType" type="checkbox" name="type[]" value="咖啡厅/茶室">咖啡厅/茶室</label>
										<span>&nbsp;&nbsp;(可多选)</span>
									</td>
								</tr>

								<tr class="t_three">
									<td class="title_style">会议时长:</td>
									<td>
										<select name="s_meeting" id="s_meeting" style="width: 80px; height: 25px; margin-right: 14px;">
										
											<option>
												@if(session('meetTime'))
													{{ session('meetTime') }}
												@else
													会议时长
												@endif

											</option>
									
											<option>一晚</option>
											<option>半天</option>
											<option>一天</option>
											<option>两天</option>
											<option>3-4天</option>
											<option>5-7天</option>
											<option>7-14天</option>
											<option>14天以上</option>
										</select>

					<!-- 					<select name="s_startTime" id="s_startTime" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>
												@if(session('startTime'))
													{{ session('startTime') }}
												@else
													开始时间
												@endif

											</option>
										</select> -->

										<input type="text" id="J-xl" placeholder="开始时间" name="startTime" value="{{ session('startTime') }}" style="width: 80px; height: 25px; margin-right: 14px;">





									</td>
								</tr>
								
								<tr class="t_four">
									<td class="title_style" style="color: #ccc;">酒店星级:</td>
									<td>
										<label style="color: #ccc;"><input disabled type="radio" id="zone" name="star" value="三星以下">三星以下</label>
										<label style="color: #ccc;"><input disabled type="radio" id="star_three" name="star" value="三星级">三星级</label>
										<label style="color: #ccc;"><input disabled type="radio" id="star_foue" name="star" value="四星级">四星级</label>
										<label style="color: #ccc;"><input disabled type="radio" id="star_five" name="star" value="五星级">五星级</label>
										<label style="color: #ccc;"><input disabled type="radio" id="star_six" name="star" value="六星级">六星级</label>
										<label style="color: #ccc;"><input disabled type="radio" id="star_seven" name="star" value="七星级">七星级</label>
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

							<select name="" id="">
							  <option>综合排名</option>
							</select>

							<select name="" id="s_popularity">
							  <option>人气</option>
							  <option value="0">从低到高</option>
							  <option value="1">从高到低</option>
							</select>

							<select name="" id="s_price">
							  <option>价格</option>
							  <option value="0">从低到高</option>
							  <option value="1">从高到低</option>
							</select>

							<select name="" id="s_kredit">
							  <option>信用度</option>
							  <option value="0">从低到高</option>
							  <option value="1">从高到低</option>
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
							<img src="{{ asset('/uploads/meetimg/') }}/{{ $val->meetImg }}" width="241" height="195" class="float_one" />
							<div class="left_con_two">

								<div class="left_con_two_tit">
									<input type="hidden" name="merchantID" value="{{ $val->id }}" id="merchantID">
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
										<span class="span_l_a" >会场数量 : {{ $val->siteNumber }}</span><br />
										<span class="span_l_b" >场地面积 : {{ $val->maxArea }}M<sup>2</sup> &nbsp;(50*40*9M)</span><br />
										<span class="span_l_c" >最多容纳人数 : {{ $val->maxPerson }}人</span>
										
									</div>
									<div class="float_cont_r">
									<img src="{{ asset('/images/collect.png') }}" class="xin_a" />
										<span class="float_cont_rmb"><sup>¥</sup><b>{{ $val->meetPrice }}</b>起</span>
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
	

@endsection