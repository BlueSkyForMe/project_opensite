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
				<form action="" method="" enctype="multipart/form-data">
					<table>
						<tr>
							<td align="right">* 场地类型 :</td>
							<td  height="43">
								<select style="height: 26px; width: 108px;" name="">
									<option value="">请选择</option>
									<option value="">酒店</option>
									<option value="">场馆</option>
								</select>
								<select style="height: 26px; width: 108px; margin-left: 25px;" name="">
									<option value="">请选择</option>
									<option value="">酒店</option>
									<option value="">场馆</option>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">* 地址 :</td>
							<td td  height="43">
								<select style="height: 26px; width: 108px;">
									<option>请选择</option>
									<option>北京</option>
									<option>上海</option>
								</select>
								<select style="height: 26px; width: 108px; margin-left: 25px;">
									<option>请选择</option>
									<option>某某</option>
									<option>某某</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td height="43"><input type="text" name="" value="" placeholder="请填写详细街道位置"></td>
						</tr>
						<tr>
							<td align="right">* 电话 :</td>
							<td>
								<input type="text" name="" value="">
							</td>
						</tr>
						<tr>
							<td align="right">上传场地出租凭证 :</td>
							<td height="58">
								<input type="file" name=""><span>企业请上传公司营业执照副本复印件并加盖公章</span>
								<span>闲置会议室出租请上传租赁合同或房产证</span>
							</td>
						</tr>
						<tr>
							<td align="right">可提供免费服务 :</td>
							<td height="46">
								<label><input type="checkbox" name="server[]" value="0"> 音箱 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 无线话筒 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 固定投影 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 固定幕布 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 移动投影 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 移动幕布 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 电视屏 &nbsp;</label>   <br/>
								<label><input type="checkbox" name="server[]" value="0"> 白板 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 移动舞台 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 茶/水 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 纸笔 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 桌卡 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 指引牌 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 签到台 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 鲜花 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 茶歇 &nbsp;</label> <br>
								<label><input type="checkbox" name="server[]" value="0"> 有线话筒 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 台式话筒 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 小蜜 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> LED屏 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 移动讲台 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 宽带接口 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 代客泊车 &nbsp;</label>
								<label><input type="checkbox" name="server[]" value="0"> 停车场  &nbsp;</label>

							</td>
						</tr>
						<tr>
							<td align="right">客房 :</td>
							<td height="46">
								<label><input type="radio" name="kefang" value="1"> 有 &nbsp;</label>
								<label><input type="radio" name="kefang" value="0"> 无 &nbsp;</label>
							</td>
						</tr>
						<tr>
							<td align="right">餐饮 :</td>
							<td height="46">
								<label><input type="radio" name="canyin" value="1"> 有 &nbsp;</label>
								<label><input type="radio" name="canyin" value="0"> 无 &nbsp;</label>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="select_wrap">
				<a href="#"><img class="pre" src="{{ asset ('/images/pre.png') }}"></a>
				<a href="#"><img class="nex" src="{{ asset ('/images/next.png') }}"></a>
			</div>
		</div>
	</div>

@endsection