@extends('home.layout')

@section('content')
		
	<!-- 主体main -->
		<div class="min">
			<!--================== 选项栏 ==================-->
			<div class="min_header">
				<div class="header_op">
					<span class="op_char">首页>场地搜索>北京四川五粮液龙爪树宾馆>评价</span>
				</div>
			</div>
			<!--================== 显示搜索结果头信息 ==================-->
			
				<!-- 加载编辑器的容器 -->
				<form action="{{ url('/home/pingl/insert') }}" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}
			<div class="pingl" >
			   
				<!-- 加载编辑器的容器 -->
			    <script id="container" name="content" type="text/plain" style="width:1196px;height:220px;margin:auto;">
			        这里写你的初始化内容
			    </script>
			    <!-- 配置文件 -->
			    <script type="text/javascript" src="{{ asset('/ueditor/ueditor.config.js') }}"></script>
			    <!-- 编辑器源码文件 -->
			    <script type="text/javascript" src="{{ asset('/ueditor/ueditor.all.js') }}"></script>
			    <!-- 实例化编辑器 -->
			    <script type="text/javascript">
			        var ue = UE.getEditor('container');
			    </script>
			</div>
			
			<div class="plbtn">
					<a href="{{ url('/home/pingl/insert') }}"><button id='butter-one'>发布</button>
			</div>
			</form>
			<!--================== 用户评论 ==================-->
			<div id="review">
				<div class="review_header">
					<p><span class="re_de">评论详情(325321)</span> &nbsp;场地总评分<span style="color: red;">4.7</span>分, 共23586次打分</p>
				</div>
				<!-- 评论内容 (遍历数据库)-->
				<div class="review_contents">
					<div class="photo"><img src="./images/photo.png"><p>BUEOIKFKJ</p></div>
					<div class="con">
						<div><p>房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适,房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适</p></div>
						<div><img src="./images/re.png"></div>
						<div class="con_type"><span>所用场地：第一会议室 会议人数：200 会议类型：新闻发布会</span></div>
					</div>
				</div>
				<!--此处不该有，为展示页面添加，后期遍历数据库时，删除此段-->
				<!-- 评论内容 (遍历数据库)-->
				<div class="review_contents">
					<div class="photo"><img src="./images/photo.png"><p>BUEOIKFKJ</p></div>
					<div class="con">
						<div><p>房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适,房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适</p></div>
						<div><img src="./images/re.png"></div>
						<div class="con_type"><span>所用场地：第一会议室 会议人数：200 会议类型：新闻发布会</span></div>
					</div>
				</div>
				<!-- 评论内容 (遍历数据库)-->
				<div class="review_contents">
					<div class="photo"><img src="./images/photo.png"><p>BUEOIKFKJ</p></div>
					<div class="con">
						<div><p>房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适,房子很好,场地布置也非常完美,整体感觉不错,费用还有优惠,感觉很合适</p></div>
						<div><img src="./images/re.png"></div>
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
					<li>
						<img src="./images/tui01.png">
						<div class="explain">
							<div><p class="ex_name">水立方</p></div>
							<div><span>所在地：北京市海淀区紫竹院路29号</span></div>
							<div><span>会场数量：40 最大会场面积：1350平方米</span></div>
							<div><span>最多容纳人数：1400</span></div>
							<div><span>联系电话：010-84826954</span></div>
						</div>
					</li>
				<li>
					<img src="./images/tui02.png">
					<div class="explain">
						<div><p class="ex_name">水立方</p></div>
						<div><span>所在地：北京市海淀区紫竹院路29号</span></div>
						<div><span>会场数量：40 最大会场面积：1350平方米</span></div>
						<div><span>最多容纳人数：1400</span></div>
						<div><span>联系电话：010-84826954</span></div>
					</div>
				</li>
				<li>
				<img src="./images/tui03.png">
					<div class="explain">
						<div><p class="ex_name">水立方</p></div>
						<div><span>所在地：北京市海淀区紫竹院路29号</span></div>
						<div><span>会场数量：40 最大会场面积：1350平方米</span></div>
						<div><span>最多容纳人数：1400</span></div>
						<div><span>联系电话：010-84826954</span></div>
					</div>
				</li>
				<li>
					<img src="./images/tui04.png">
					<div class="explain">
						<div><p class="ex_name">水立方</p></div>
						<div><span>所在地：北京市海淀区紫竹院路29号</span></div>
						<div><span>会场数量：40 最大会场面积：1350平方米</span></div>
						<div><span>最多容纳人数：1400</span></div>
						<div><span>联系电话：010-84826954</span></div>
					</div>
				</li>
				</ul>
			</div>
			<!-- /推荐结束 -->




		</div> 
		<!-- /主体结束 -->

@endsection
