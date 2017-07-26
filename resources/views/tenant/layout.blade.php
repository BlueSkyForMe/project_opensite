<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | {{ $title }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset ('/tenant/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{ asset ('/tenant/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="{{ asset ('/tenant/dist/css/timeline.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset ('/tenant/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="{{ asset ('/tenant/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset ('/tenant/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/tenant/index') }}">商户中心</a>
                <ul class="nav navbar-nav">
                  <li class="hidden-sm hidden-md">
                    <a href="{{ url('/home/index') }}">开场首页</a>
                  </li>
                </ul>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> {{ session('huser')['userName'] }}</a>
                        </li>
                        <li class="divider"></li>    
                        <li>
                            <a href="{{ url('/tenant/logout') }}"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder-open fa-fw"></i>基本信息<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="{{ url('/tenant/detail/complete') }}">完善信息</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/detail/addImg') }}/{{ session('hmer')->id }}">上传展示图</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/detail/edit') }}/{{ session('hmer')->id }}">修改信息</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/detail/editImg') }}/{{ session('hmer')->id }}">更新展示图</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>场地管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="{{ url('/tenant/mansite/siteAdd') }}">添加会场</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/mansite/siteShow') }}/{{ session('hmer')->id }}">会场信息</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/mansite/guestAdd') }}">添加客房</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/mansite/guestShow') }}/{{ session('hmer')->id }}">客房信息</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/mansite/restAdd') }}">添加茶歇</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/mansite/restShow') }}/{{ session('hmer')->id }}">茶歇信息</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/mansite/avAdd') }}">添加设备</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/mansite/avShow') }}/{{ session('hmer')->id }}">AV设备</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>交易管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse in">
                                <li>
                                    <a href="{{ url('/tenant/index') }}">订单管理</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/index') }}">档期管理</a>
                                </li>
                                <li>
                                    <a href="{{ url('/tenant/index') }}">评价管理</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>     
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')

    </div>

    <!-- 大图模态框 -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <img id="modal_reveal_bigimg" width="450px" height="360px" src="">
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset ('/tenant/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset ('/tenant/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset ('/tenant/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset ('/tenant/bower_components/raphael/raphael-min.js') }}"></script>
   
    <!-- Custom Theme JavaScript -->
    <script src="{{  ('/tenant/dist/js/sb-admin-2.js') }}"></script>

    @yield('js')

</body>

</html>
