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
										<input type="text" placeholder=" {{ $postData['city'] }} " id="destination" style="width: 80px; height: 25px; margin-right: 14px;" name="city" value="">
										<div id="in_city" style="display: none; position:absolute; top: 64px; left: -292px;"></div>

										<select name="s_person" id="s_person" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>{{ $postData['supPerson'] }}</option>
											<option>人数不限</option>
											<option>10-50</option>
											<option>50-100</option>
											<option>100-300</option>
											<option>300-500</option>
											<option>500-1000</option>
											<!-- <option>1000+</option> -->
										</select>
										<select name="s_budget" id="s_budget" style="width: 80px; height: 25px; margin-right: 14px;">
											<option>{{ $postData['budget'] }}</option>
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
										<select name="s_meeting" id="s_meeting" style="width: 80px; height: 25px; margin-right: 14px;">
										
											<option>{{ $postData['meeting'] }}</option>
									
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
											<option>{{ $postData['starTime'] }}</option>
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