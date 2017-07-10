@extends('home.layout')

@section('content')

		<!-- 主体main -->
		<div class="main">

			<div class="wrap_column">
				<div class="column">
					<span>首页 > 确认订单信息</span>
				</div>
			</div>

			
			<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->
			<form action="" method="post">

				<!-- 基本信息 -->
				<div class="wrap_base_info">
					<div class="base_info"><span>基本信息</span></div>

					<div class="f_left">
						<table>
							<tr>
								<td>活动名称 : </td>
								<td><input type="text" name="action_name" value=""></td>
								<td> * </td>
							</tr>
							<tr>
								<td>主办方 : </td>
								<td><input type="text" name="sponsor" placeholder="人名 / 公司名" value=""></td>
								<td> * </td>
							</tr>
							<tr>
								<td>参会人数 : </td>
								<td><input type="text" name="attendance" placeholder="" value=""></td>
								<td> * </td>
							</tr>
						</table>
					</div>

					<div class="f_right">
						<table >
							<tr>
								<td>联系人 : </td>
								<td><input type="text" name="action_name" placeholder="张三" value=""></td>
								<td> * </td>
							</tr>
							<tr>
								<td>联系方式 : </td>
								<td><input type="text" name="sponsor" placeholder="010-1234 5678" value=""></td>
								<td> * </td>
							</tr>
							<tr>
								<td>联系地址 : </td>
								<td><input type="text" name="attendance" placeholder="" value=""></td>
								<td> * </td>
							</tr>
						</table>
					</div>

				</div>

				<!-- 订单 -->
				<div class="order">
					<div class="order_info"><span>订单信息</span></div>

			
						<div class="order_title">
							<ul>
								<li class="li_f">商家会场</li>
								<li class="li_s">类型</li>
								<li class="li_t">单价</li>
								<li class="li_fo">档期</li>
								<li class="li_fi">数量</li>
								<li class="li_si">小计</li>
							</ul>
						</div>

					<!-- 企业名称 -->
						<ul class="order_name">
							<li class="td_f">*北京四川五粮液龙爪树宾馆</li>
							<li class="td_s"><a href="#">客服对话</a></li>
							<li colspan="4"></li>
						</ul>
					
					<!-- 订单具体内容 -->
						<div class="order_content">
													
							<ul>
								<li class="con_fiest">
									<div>
										<div class="con_img"><img src="{{ asset('/images/order_1.png') }}"></div>
										<div class="con_name ">
											<p>大宴会厅</p>
											<div class="con_des"><span>地方方正</span><span>装修精美</span></div>
										</div>
									</div>
								</li>
								<li class="con_second con_same"><span>大宴会厅</span></li>
								<li class="con_three con_same"><span>300.00</span></li>
								<li class="con_four con_same"><span>2017年6月12-15日</span></li>
								<li class="con_five con_same"><span>1</span></li>
								<li class="con_six con_same"><span>300.00</span></li>
							</ul>

							<ul>
								<li class="con_fiest">
									<div>
										<div class="con_img"><img src="{{ asset('/images/order_2.png') }}"></div>
										<div class="con_name ">
											<p>会议茶歇</p>
											<!-- <div class="con_des"><span>地方方正</span><span>装修精美</span></div> -->
										</div>
									</div>
								</li>
								<li class="con_second con_same"><span>中式</span></li>
								<li class="con_three con_same"><span>150.00</span></li>
								<li class="con_four con_same"><span></span></li>
								<li class="con_five con_same"><span>1</span></li>
								<li class="con_six con_same"><span>150.00</span></li>
							</ul>

						</div>

					<!-- 买家留言  -->
						<ul class="message">
							<li class="mes_first">商家留言 ：</li>
							<li class="mes_second"><input type="text" name="" value=""></li>
							<li class="mes_three"><a href="#">场地租赁条款与须知</a></li>
						</ul>

						<div class="cle"></div>
					
					<!-- 企业名称 -->
						<ul class="order_name">
							<li class="td_f">*北京四川五粮液龙爪树宾馆</li>
							<li class="td_s"><a href="#">客服对话</a></li>
							<li colspan="4"></li>
						</ul>
					
					<!-- 订单具体内容 -->
						<div class="order_content">
													
							<ul>
								<li class="con_fiest">
									<div>
										<div class="con_img"><img src="{{ asset('/images/order_1.png') }}"></div>
										<div class="con_name ">
											<p>大宴会厅</p>
											<div class="con_des"><span>地方方正</span><span>装修精美</span></div>
										</div>
									</div>
								</li>
								<li class="con_second con_same"><span>大宴会厅</span></li>
								<li class="con_three con_same"><span>300.00</span></li>
								<li class="con_four con_same"><span>2017年6月12-15日</span></li>
								<li class="con_five con_same"><span>1</span></li>
								<li class="con_six con_same"><span>300.00</span></li>
							</ul>

							<ul>
								<li class="con_fiest">
									<div>
										<div class="con_img"><img src="{{ asset('/images/order_2.png') }}"></div>
										<div class="con_name ">
											<p>会议茶歇</p>
											<!-- <div class="con_des"><span>地方方正</span><span>装修精美</span></div> -->
										</div>
									</div>
								</li>
								<li class="con_second con_same"><span>中式</span></li>
								<li class="con_three con_same"><span>150.00</span></li>
								<li class="con_four con_same"><span></span></li>
								<li class="con_five con_same"><span>1</span></li>
								<li class="con_six con_same"><span>150.00</span></li>
							</ul>

						</div>

					<!-- 买家留言  -->
						<ul class="message">
							<li class="mes_first">商家留言 ：</li>
							<li class="mes_second"><input type="text" name="" value=""></li>
							<li class="mes_three"><a href="#">场地租赁条款与须知</a></li>
						</ul>
				
				</div>	
				
				<!-- 清浮动 -->
				<div class="cle"></div>
		
				<!-- 结算 -->
				<div class="count">
					<div class="price"><span>总计 :</span><b> ￥330,330.00 </b></div>
					<div class="sm"><input type="image" src="{{ asset('/images/submit.png') }}"></div>
				</div>

			</form>
			<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->

		</div>
		<!-- /主体结束 -->


@endsection

@section('js')



@endsection