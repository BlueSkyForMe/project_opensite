@extends('home.layout')

@section('content')

	<!-- 主体main -->
	<div class="main">

		<div class="wrap_column">
			<div class="column">
				<span>商家中心 > 添加商户</span>
			</div>
		</div>
		
		<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->
		<div class="info">
			<span>申请开场商户完全免费；一个企业只能开设一个账户；申请到正式开通预计需1~3个工作日。了解更多请查看<b><a href="#">《开场商户守则》</a></b></span>
		</div>

		<div class="flow"><img src="{{ asset ('/images/register2.png') }}"></div>

		<div class="show2">
			<div class="shanghu"><span>开场商户版</span></div>
			<div class="shuoming2">
				<form action="{{ url ('/home/merchant/fillUpdate') }}/{{ $uid }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<table>
						<tr>
							<td align="right">单位名称 :&nbsp;&nbsp;</td>
							<td height="43">
								<input style="width: 244px; height: 21px;" type="text" name="address" value="{{ $data->userName }}" disabled >
							</td>
						</tr>
						<tr>
							<td align="right">场地类型 :&nbsp;&nbsp;</td>
							<td height="43">
								<select id="sitetype-sel" style="height: 26px; width: 108px;" name="class">
									<option value="0">请选择场地类型</option>
									<option value="酒店" 
									@if($data->class == "酒店")
										selected
									@endif
									>酒店</option>
									<option value="会议中心" 
									@if($data->class == "会议中心")
										selected
									@endif
									>会议中心</option>
									<option value="体育馆"
									@if($data->class == "体育馆")
										selected
									@endif
									>体育馆</option>
									<option value="展览馆" 
									@if($data->class == "展览馆")
										selected
									@endif
									>展览馆</option>
									<option value="酒吧/餐厅/会所" 
									@if($data->class == "酒吧/餐厅/会所")
										selected
									@endif
									>酒吧/餐厅/会所</option>
									<option value="艺术中心/剧院" 
									@if($data->class == "艺术中心/剧院")
										selected
									@endif
									>艺术中心/剧院</option>
									<option value="咖啡厅/茶室" 
									@if($data->class == "咖啡厅/茶室")
										selected
									@endif
									>咖啡厅/茶室</option>
								</select>
								<select id="rating-sel" style="
								@if($data->star == '0')
									display: none;
								@else
									display: inline;
								@endif		
								height: 26px; width: 108px; margin-left: 25px;" name="star" >
									<option value="0">请选择酒店星级</option>
									<option value="三星以下" 
									@if($data->star == "三星以下")
										selected
									@endif
									>三星以下</option>
									<option value="三星级" 
									@if($data->star == "三星级")
										selected
									@endif
									>三星级</option>
									<option value="四星级" 
									@if($data->star == "四星级")
										selected
									@endif
									>四星级</option>
									<option value="五星级" 
									@if($data->star == "五星级")
										selected
									@endif
									>五星级</option>
									<option value="六星级" 
									@if($data->star == "六星级")
										selected
									@endif
									>六星级</option>
									<option value="七星级" 
									@if($data->star == "七星级")
										selected
									@endif
									>七星级</option>
								</select>
								<div id="rating_hint" style="position: absolute; display: none; width: 120px; height: 20px; top:280px; left: 710px;"></div>
							</td>
						</tr>
						<tr>
							<td align="right">地址 :&nbsp;&nbsp;</td>
							<td height="43">
								<input id="detail_site" style="width: 244px; height: 21px;" type="text" name="address" value="{{ $data->address }}" placeholder="请填写详细街道位置">
								<div id="site_hint" style="position: absolute; display: none; width: 120px; height: 20px; top:325px; left: 710px;"></div>
							</td>
						</tr>
						<tr>
							<td align="right">电话 :&nbsp;&nbsp;</td>
							<td>
								<input id="phone" style="width: 244px;" type="text" name="phone" value="{{ $data->phone }}" placeholder="固定电话/手机">
								<div id="phone_hint" style="position: absolute; display: none; width: 120px; height: 20px; top:355px; left: 710px;" ></div>
							</td>
						</tr>
						<tr>
							<td align="right">更改场地出租凭证 :&nbsp;&nbsp;</td>
							<td height="58">
								<input type="file" name="img">
								<div id="img_hint" style="position: absolute; display: none; width: 200px; height: 20px; top:388px; left: 710px;"></div>
								<span>企业请上传公司营业执照副本复印件并加盖公章</span>
								<span>闲置会议室出租请上传租赁合同或房产证</span>
							</td>
						</tr>
						<tr>
							<td align="right">可提供免费服务 :&nbsp;&nbsp;</td>
							<td height="46">
								<label><input type="checkbox" name="servers[]" value="音箱" 
								@if(in_array("音箱",$servers))
									checked 
								@endif
								> 音箱 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="无线话筒" 
								@if(in_array("无线话筒",$servers))
									checked 
								@endif
								> 无线话筒 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="固定投影" 
								@if(in_array("固定投影",$servers))
									checked 
								@endif
								> 固定投影 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="固定幕布" 
								@if(in_array("固定幕布",$servers))
									checked 
								@endif
								> 固定幕布 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="移动投影" 
								@if(in_array("移动投影",$servers))
									checked 
								@endif
								> 移动投影 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="移动幕布" 
								@if(in_array("移动幕布",$servers))
									checked 
								@endif
								> 移动幕布 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="电视屏" 
								@if(in_array("电视屏",$servers))
									checked 
								@endif
								> 电视屏 &nbsp;</label>   <br/>
								<label><input type="checkbox" name="servers[]" value="白板" 
								@if(in_array("白板",$servers))
									checked 
								@endif
								> 白板 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="移动舞台"
								@if(in_array("移动舞台",$servers))
									checked 
								@endif
								> 移动舞台 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="茶/水" 
								@if(in_array("茶/水",$servers))
									checked 
								@endif
								> 茶/水 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="纸笔" 
								@if(in_array("纸笔",$servers))
									checked 
								@endif
								> 纸笔 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="桌卡" 
								@if(in_array("桌卡",$servers))
									checked 
								@endif
								> 桌卡 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="指引牌" 
								@if(in_array("指引牌",$servers))
									checked 
								@endif
								> 指引牌 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="签到台" 
								@if(in_array("签到台",$servers))
									checked 
								@endif
								> 签到台 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="鲜花" 
								@if(in_array("鲜花",$servers))
									checked 
								@endif
								> 鲜花 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="茶歇" 
								@if(in_array("茶歇",$servers))
									checked 
								@endif
								> 茶歇 &nbsp;</label> <br>
								<label><input type="checkbox" name="servers[]" value="有线话筒" 
								@if(in_array("有线话筒",$servers))
									checked 
								@endif
								> 有线话筒 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="台式话筒"
								@if(in_array("台式话筒",$servers))
									checked 
								@endif
								> 台式话筒 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="小蜜" 
								@if(in_array("小蜜",$servers))
									checked 
								@endif
								> 小蜜 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="LED屏" 
								@if(in_array("LED屏",$servers))
									checked 
								@endif
								> LED屏 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="移动讲台"
								@if(in_array("移动讲台",$servers))
									checked 
								@endif
								> 移动讲台 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="宽带接口" 
								@if(in_array("宽带接口",$servers))
									checked 
								@endif
								> 宽带接口 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="代客泊车" 
								@if(in_array("代客泊车",$servers))
									checked 
								@endif
								> 代客泊车 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="停车场"
								@if(in_array("停车场",$servers))
									checked 
								@endif
								> 停车场  &nbsp;</label>
							</td>
						</tr>
						<tr>
							<td align="right">客房 :&nbsp;&nbsp;</td>
							<td height="46">
								<label><input type="radio" name="room" value="1" 
								@if($data->room == 1)
									checked
								@endif	
								> 有 &nbsp;</label>
								<label><input type="radio" name="room" value="0" 
								@if($data->room == 0)
									checked
								@endif	
								> 无 &nbsp;</label>
							</td>
						</tr>
						<tr>
							<td align="right">餐饮 :&nbsp;&nbsp;</td>
							<td height="46">
								<label><input type="radio" name="repast" value="1" 
								@if($data->repast == 1)
									checked
								@endif
								> 有 &nbsp;</label>
								<label><input type="radio" name="repast" value="0"
								@if($data->repast == 0)
									checked
								@endif
								> 无 &nbsp;</label>
							</td>
						</tr>
					</table>
					<div style="margin-top: 50px;" class="select_wrap">
						<button id="subm" style="margin-left:330px;margin-top:-2px;" type="submit" class="btn btn-primary active">确认修改</button>
					</div>
				</form>
				<a style="margin-top: -48px; margin-left:420px;" href="{{ url('/home/merchant/attest') }}/{{ $uid }}" class="btn btn-primary active" role="button">放弃修改</a>
				
			</div>
		</div>
	</div>

@endsection

@section('js')

	<script type="text/javascript">

		// 选择场地类型
		$("#sitetype-sel").on('change', function()
			{
				// 隐藏错误提示
				$("#rating_hint").css('display', 'none');

				// 获取value值
				var val = $(this).val();

				// 判断是否选择酒店
				if(val == '酒店')
				{
					// 选择酒店显示星级选择
					$(this).next().css('display', 'inline');
				}
				else
				{	
					// 隐藏星级选择
					$(this).next().css('display', 'none');
				}
			});


		// 获取详细地址input框事件
		$("#detail_site").on('focus', function()
			{
				// 获取场地类型value值
				var typeval = $("#sitetype-sel").val();

				// 判断
				if(typeval == 0)
				{
					// 提示错误信息
					$("#rating_hint").css('color', 'red');
					$("#rating_hint").css('display', 'block');
					$("#rating_hint").html('×请选择场地类型');
				}
			});

		// 详细地址input框失去焦点事件
		$("#detail_site").on('blur', function()
			{
				// 获取value值
				var val =  $(this).val();

				// 判断
				if(!val)
				{
					$("#site_hint").css('color', 'red');
					$("#site_hint").css('display', 'block');
					$("#site_hint").html('×请填写详细地址');
				}
				else
				{
					// 提示输入正确
					$("#site_hint").css('color', 'green');
					$("#site_hint").css('display', 'block');
					$("#site_hint").html('√');
				}
			});

		// 获取电话input框事件
		$("input[name='phone']").on("focus", function()
			{
				// 获取详细地址val
				var addval = $("input[name='address']").val();

				// 判断
				if(!addval)
				{
					$("#site_hint").css('color', 'red');
					$("#site_hint").css('display', 'block');
					$("#site_hint").html('×请填写详细地址');
				}
			});

		// 电话input框失去焦点事件
		$("input[name='phone']").on("blur", function()
			{
				// 获取电话val
				var phonval = $(this).val();

				// 判断
				if(!phonval)
				{
					$("#phone_hint").css('color', 'red');
					$("#phone_hint").css('display', 'block');
					$("#phone_hint").html('×请填写电话');
				}
				else
				{
					$("#phone_hint").css('color', 'green');
					$("#phone_hint").css('display', 'block');
					$("#phone_hint").html('√');
				}
			});

		// 定义图片类型 
		var imgArr = ["bmp","jpg","gif","png"];

		// 点击下一步事件
		$("#subm").on('click', function()
			{
				// 获取场地类型值
				var typeVal = $("#sitetype-sel").val();

				// 判断是否选择
				if(typeVal == 0)
				{
					// 提示错误信息
					$("#rating_hint").css('color', 'red');
					$("#rating_hint").css('display', 'block');
					$("#rating_hint").html('×请选择场地类型');

					// 阻止提交
					return false;
				}

				// 判断是否选择酒店
				if(typeVal == '酒店')
				{
					// 获取酒店星级的值
					var hotelVal = $("#rating-sel").val();

					// 判断是否选择酒店星级
					if(hotelVal == 0)
					{
						// 提示错误信息
						$("#rating_hint").css('color', 'red');
						$("#rating_hint").css('display', 'block');
						$("#rating_hint").html('×请选择酒店星级');

						// 阻止提交
						return false;
					}
				}

				// 获取详细地址的value值
				var detailVal = $("#detail_site").val();

				// 判断
				if(detailVal == 0)
				{
					$("#site_hint").css('color', 'red');
					$("#site_hint").css('display', 'block');
					$("#site_hint").html('×请填写详细地址');

					// 阻止提交
					return false;
				}

				// 获取电话的value值
				var phonelVal = $("input[name='phone']").val();
				
				// 判断
				if(phonelVal == 0)
				{
					$("#phone_hint").css('color', 'red');
					$("#phone_hint").css('display', 'block');
					$("#phone_hint").html('×请填写电话');

					// 阻止提交
					return false;
				}

				// 获取图片value值
				var imgVal = $("input[name='img']").val();

				// 判断
				if(imgVal == "")
				{
					return true;
				}
				else
				{
					var file = $("input[name='img']").val();
			        var len = file.length;
			        var ext = file.substring(len-3,len).toLowerCase();

			        // 判断是否为图片
			        if($.inArray(ext,imgArr) == -1)
			        {
			        	$("#img_hint").css('color', 'red');
						$("#img_hint").css('display', 'block');
						$("#img_hint").html('×请上传正确格式的图像');

						// 阻止提交
						return false;
			        }
				}
			});

	</script>

@endsection