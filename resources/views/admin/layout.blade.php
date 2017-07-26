<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} | {{ $title }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset ('/admin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="{{ asset ('/admin/adminlte/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
  <script src="{{ asset ('/admin/adminlte/https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/admin/index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>租赁平台</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>开</b>场</span>
    </a>

    <!-- 头部导航条 -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

<!-- 用户的账号风格和退出功能 -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset ('/uploads/photo') }}/{{ session('master')->photo }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ session('master')->userName }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset ('/uploads/photo') }}/{{ session('master')->photo }}" class="img-circle" alt="User Image">

                <p>
                  开场租赁平台管理员
                  <small>{{ session('master')->userName }}</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-flat">退出登录</a>
                </div>
              </li>
            </ul>
          </li>
<!-- /用户的账号风格和退出功能 -->

<!-- 控制条的切换按钮 -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
<!-- /控制条的切换按钮 -->

        </ul>
      </div>
    </nav>
    <!-- /头部导航条 -->
  </header>

<!-- 左侧侧边栏 -->
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">主要 导航</li>

  <!-- 后台管理 -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>后台管理</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="{{ url('/admin/manage/add') }}"><i class="fa fa-circle-o"></i> 添加管理员</a></li>
              <li><a href="{{ url('/admin/manage/index') }}"><i class="fa fa-circle-o"></i> 管理员列表</a></li>
            </ul>
          </li>
  <!-- /后台管理 -->

  <!-- 用户管理 -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span>用户管理</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="{{ url ('/admin/user/index') }}"><i class="fa fa-circle-o"></i> 用户列表</a></li>
              <li><a href="{{ url ('/admin/merchant/index') }}"><i class="fa fa-circle-o"></i> 商户列表</a></li>
            </ul>
          </li>
  <!-- /用户管理 -->

  <!-- 商户审核 -->
          <li class="treeview">
            <a href="#">
              <i class="fa  fa-hourglass"></i> <span>商户审核</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url ('/admin/merchant/check') }}"><i class="fa fa-hourglass-1"></i> 待审核商户</a></li>
              <li><a href="{{ url ('/admin/merchant/loser') }}"><i class="fa fa-hourglass-o"></i> 审核未通过</a></li>
            </ul>
          </li>
  <!-- /商户审核 -->

  <!-- 订单管理 -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span>订单管理</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="{{ url('/admin/order/index') }}"><i class="fa fa-circle-o"></i> 订单列表</a></li>
            </ul>
          </li>
  <!-- /订单管理 -->

  <!-- 评论管理 -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span>评论管理</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="#"><i class="fa fa-circle-o"></i> 评论列表</a></li>
            </ul>
          </li>
  <!-- /评论管理 -->

  <!-- 广告管理 -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>广告管理</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('/admin/ad/index') }}"><i class="fa fa-circle-o"></i>友情链接</a></li>
              <li><a href="{{ url('/admin/re/index') }}"><i class="fa fa-circle-o"></i>热门排行</a></li>
            </ul>
          </li>
  <!-- /广告管理 -->


      </ul>
    </section>
  </aside>
<!-- /左侧侧边栏 -->

  @yield('content')
 
<!-- 尾部 -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017-2019 <a href="http://www.open.com">开场租赁平台</a>.</strong> 保留所有权.
  </footer>
<!-- /尾部 -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- 模态框 -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">确认删除</h4>
        </div>
        <div class="modal-body">
          您确定要删除吗？
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" id="delete" class="btn btn-primary">确定</button>
        </div>
      </div>
    </div>
  </div>
<!-- /模态框 -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset ('/admin/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset ('/admin/adminlte/bootstrap/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset ('/admin/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset ('/admin/adminlte/bootstrap/js/raphael-min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset ('/admin/adminlte/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset ('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset ('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ('/admin/adminlte/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('/admin/adminlte/bootstrap/js/moment.min.js') }}"></script>
<script src="{{ asset ('/admin/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset ('/admin/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset ('/admin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset ('/admin/adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset ('/admin/adminlte/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('/admin/adminlte/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('/admin/adminlte/dist/js/demo.js') }}"></script>

@yield('js')

</body>
</html>
