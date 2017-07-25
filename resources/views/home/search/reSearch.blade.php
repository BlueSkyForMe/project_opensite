				
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

									<div class="merid" style="display: none;">{{ $val->id }}</div>

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

										@if(session('huser')['id'])

											@foreach($collect as $k => $v)

												@if($v->mid == $val->uid)
													<img src="{{ asset('/images/collect_blue.png') }}" class="xin_a" />
													@break	
												@else
													<img src="{{ asset('/images/collect.png') }}" class="xin_a" />

												@endif

											@endforeach

										@else

											<img src="{{ asset('/images/collect.png') }}" class="xin_a" />

										@endif


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
										<a href="{{ url('/home/detail') }}/{{ $val->id }}"><img src="{{ asset('/images/yuding.png') }}"></a>
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
	

