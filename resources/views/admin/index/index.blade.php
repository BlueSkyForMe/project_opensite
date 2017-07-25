@extends('admin.layout')

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @if (session('master')->auth == 1)
          超级管理员
        @else
          管理员
        @endif
        <small>
          @if (session('info'))
            <p class="text-danger">{{ session('info') }}</p>
          @endif
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 后台首页</a></li>
        <li class="active">网站导航</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <h3>&nbsp;&nbsp;&nbsp;平台基本信息</h3>
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            @if('orders')
              <h3>{{ $orders }}</h3>
            @endif

              <p>平台订单数量</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            @if('mercs')
              <h3>{{ $mercs }}</h3>
            @endif

              <p>平台企业数量</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('admin/merchant/index') }}" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>



      <div class="row">

        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            @if('users')
              <h3>{{ $users }}</h3>
            @endif

              <p>平台注册用户数量</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('admin/user/index') }}" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            @if('comments')
              <h3>{{ $comments }}</h3>
            @endif

              <p>平台评论数量</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

@endsection