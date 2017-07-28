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
				<input type="hidden" name="id" value="{{ $id }}">
				{{ csrf_field() }}
			<div class="pingl" >
			   
				<!-- 加载编辑器的容器 -->
			    <script id="container" name="content" type="text/plain" style="width:1196px;height:220px;margin:auto;">
			        
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
				
				<!--此处不该有，为展示页面添加，后期遍历数据库时，删除此段-->
				<!-- 评论内容 (遍历数据库)-->
				@if($comment)
				@foreach($comment as $key => $val)
				<div class="review_contents">
					@if($res)
					@foreach($res as $key => $va)
					<div class="photo"><img src="./images/photo.png"><p>{{ $va->userName }}</p></div>
					@endforeach
					@endif
					<div class="con">
						<div><p>{{ $val->pl_content }}</p></div>
						<div><img src="./images/re.png"></div>
						<div class="con_type"><span>所用场地：{{ $val->pl_site }} 会议人数：200 会议类型：新闻发布会</span></div>
					</div>
				</div>
				@endforeach
				@endif
				<!-- 评论内容 (遍历数据库)-->
				
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
					</li>
				
				</ul>
			</div>
			<!-- /推荐结束 -->




		</div> 
		<!-- /主体结束 -->

@endsection
