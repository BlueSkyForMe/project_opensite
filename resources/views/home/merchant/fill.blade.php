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
				<form action="{{ url ('/home/merchant/add') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="uid" value="{{ $uid }}">
					<table>
						<tr>
							<td align="right">* 场地类型 :&nbsp;&nbsp;</td>
							<td height="43">
								<select id="sitetype-sel" style="height: 26px; width: 108px;" name="type">
									<option value="0">请选择场地类型</option>
									<option value="1">酒店</option>
									<option value="3">会议中心</option>
									<option value="4">体育馆</option>
									<option value="5">展览馆</option>
									<option value="6">酒吧/餐厅/会所</option>
									<option value="7">艺术中心/剧院</option>
									<option value="8">咖啡厅/茶室</option>
								</select>
								<select id="rating-sel" style="display: none; height: 26px; width: 108px; margin-left: 25px;" name="star" >
									<option value="0">请选择酒店星级</option>
									<option value="1">三星以下</option>
									<option value="2">三星级</option>
									<option value="3">四星级</option>
									<option value="4">五星级</option>
									<option value="5">六星级</option>
									<option value="6">七星级</option>
								</select>
								<div id="rating_hint" style="position: absolute; display: none; width: 120px; height: 20px; top:235px; left: 710px;"></div>
							</td>
						</tr>
						<tr>
							<td align="right">* 地址 :&nbsp;&nbsp;</td>
							<td height="43">
								<select id="city_sel" style="height: 26px; width: 108px;" name="city">
									<option value="0">请选择省市</option>
									@foreach ($cdata as $key => $val)
									<option value="{{ $val->id }}">{{ $val->name }}</option>
									@endforeach
								</select>
								<select id="county_sel" style="height: 26px; width: 108px; margin-left: 25px;" name="county">
									<option value="0">请选择城市</option>
								</select>
							</td>
							<div id="city_hint" style="position: absolute; display: none; width: 120px; height: 20px; top:277px; left: 710px;"></div>
						</tr>
						<tr>
							<td></td>
							<td height="43">
								<input id="detail_site" style="width: 244px; height: 21px;" type="text" name="address" value="" placeholder="请填写详细街道位置">
								<div id="site_hint" style="position: absolute; display: none; width: 120px; height: 20px; top:321px; left: 710px;"></div>
							</td>
						</tr>
						<tr>
							<td align="right">* 电话 :&nbsp;&nbsp;</td>
							<td>
								<input id="phone" style="width: 244px;" type="text" name="phone" value="" placeholder="固定电话/手机">
								<div id="phone_hint" style="position: absolute; display: none; width: 120px; height: 20px; top:354px; left: 710px;" ></div>
							</td>
						</tr>
						<tr>
							<td align="right">上传场地出租凭证 :&nbsp;&nbsp;</td>
							<td height="58">
								<input type="file" name="img">
								<div id="img_hint" style="position: absolute; display: none; width: 200px; height: 20px; top:385px; left: 710px;"></div>
								<span>企业请上传公司营业执照副本复印件并加盖公章</span>
								<span>闲置会议室出租请上传租赁合同或房产证</span>
							</td>
						</tr>
						<tr>
							<td align="right">可提供免费服务 :&nbsp;&nbsp;</td>
							<td height="46">
								<label><input type="checkbox" name="servers[]" value="1"> 音箱 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="2"> 无线话筒 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="3"> 固定投影 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="4"> 固定幕布 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="5"> 移动投影 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="6"> 移动幕布 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="7"> 电视屏 &nbsp;</label>   <br/>
								<label><input type="checkbox" name="servers[]" value="8"> 白板 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="9"> 移动舞台 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="10"> 茶/水 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="11"> 纸笔 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="12"> 桌卡 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="13"> 指引牌 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="14"> 签到台 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="15"> 鲜花 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="16"> 茶歇 &nbsp;</label> <br>
								<label><input type="checkbox" name="servers[]" value="17"> 有线话筒 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="18"> 台式话筒 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="19"> 小蜜 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="20"> LED屏 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="21"> 移动讲台 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="22"> 宽带接口 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="23"> 代客泊车 &nbsp;</label>
								<label><input type="checkbox" name="servers[]" value="24"> 停车场  &nbsp;</label>

							</td>
						</tr>
						<tr>
							<td align="right">客房 :&nbsp;&nbsp;</td>
							<td height="46">
								<label><input type="radio" name="room" value="1"> 有 &nbsp;</label>
								<label><input type="radio" name="room" value="0"> 无 &nbsp;</label>
							</td>
						</tr>
						<tr>
							<td align="right">餐饮 :&nbsp;&nbsp;</td>
							<td height="46">
								<label><input type="radio" name="repast" value="1"> 有 &nbsp;</label>
								<label><input type="radio" name="repast" value="0"> 无 &nbsp;</label>
							</td>
						</tr>
					</table>
					<div style="margin-top: 50px;" class="select_wrap">
						<input style="margin-left:85px;" type='image' src="{{ asset ('/images/pre.png') }}">
						<input id="subm" style="margin-left:150px;" type='image' src="{{ asset ('/images/next.png') }}">
					</div>
				</form>
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
				if(val == 1)
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

		// 城市联动
		$("#city_sel").on("change", function()
			{	
				// 隐藏错误提示
				$("#city_hint").css('display', 'none');

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

				// 定义$(this)
				var op = $(this);

				// 定义城市的全局变量
				var county = '';

				// 清空城市的select,
				op.next().empty();

				// 再创建
				op.next().html("<option value='0'>请选择城市</option>");

				// 获取省市级value
				var val = op.val();

				// 判断
				if(val != 0)
				{
					// ajax请求
					$.ajax('/home/merchant/ajaxcity',
						{
							type:"GET",
							data:{upid:val},
							success:function(data)
							{	
								// 循环json
								$.each(data, function(i,n)
									{	
										// 定义城市格式
										county += "<option value=" + n.id + ">" + n.name + "</option>";
									});

								// 插入
								op.next().prepend(county);
							},
							dataType:'json'
						});
				}
			});

		// 隐藏城市错误提示事件
		$("#city_sel").next().on("change", function()
			{
				// 隐藏错误提示
				$("#city_hint").css('display', 'none');
			});


		// 获取详细地址input框事件
		$("#detail_site").on('focus', function()
			{
				// 获取城市的value值
				var cityval =  $("#city_sel").val();

				// 判断
				if(cityval == 0)
				{
					$("#city_hint").css('color', 'red');
					$("#city_hint").css('display', 'block');
					$("#city_hint").html('×请选择省市');
				}
				else
				{
					// 获取省市的value值
					var countyval =  $("#county_sel").val();

					// 判断
					if(countyval == 0)
					{
						$("#city_hint").css('color', 'red');
						$("#city_hint").css('display', 'block');
						$("#city_hint").html('×请选择省市');
					}
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
				if(typeVal == 1)
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

				// 获取城市的value值
				var cityVal = $("#city_sel").val();

				// 判断
				if(cityVal == 0)
				{
					$("#city_hint").css('color', 'red');
					$("#city_hint").css('display', 'block');
					$("#city_hint").html('×请选择省市');

					// 阻止提交
					return false;
				}

				// 获取省市的value值
				var countyVal = $("#county_sel").val();

				// 判断
				if(countyVal == 0)
				{
					$("#city_hint").css('color', 'red');
					$("#city_hint").css('display', 'block');
					$("#city_hint").html('×请选择省市');

					// 阻止提交
					return false;
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
					$("#img_hint").css('color', 'red');
					$("#img_hint").css('display', 'block');
					$("#img_hint").html('×请上传营业执照或其他租赁凭证');

					// 阻止提交
					return false;
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