<!DOCTYPE html>
<html lang="en">
<!-- container-fluid -->
<head>
    <title>很简洁漂亮的Bootstrap响应式后台管理系统模板UniAdmin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{URL::asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/css/uniform.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/css/select2.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/css/unicorn.main.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/css/unicorn.grey.css')}}" class="skin-color" />





    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

@section('header')
    <div id="header">
        <h1><a href="./dashboard.html">UniAdmin</a></h1>
    </div>

    <div id="search">
        <input type="text" placeholder="请输入搜索内容..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav btn-group">
            <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span class="text">个人资料</span></a></li>
            <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">消息</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="" href="#">新消息</a></li>
                    <li><a class="sInbox" title="" href="#">收件箱</a></li>
                    <li><a class="sOutbox" title="" href="#">发件箱</a></li>
                    <li><a class="sTrash" title="" href="#">发送</a></li>
                </ul>
            </li>
            <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
            <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
        </ul>
    </div>
@show

@section('sidebar')
    <div id="sidebar">
        <a href="#" class="visible-phone"><i class="icon icon-home"></i> 首页</a>
        {!! $menu_list !!}
    </div>
@show

<div id="style-switcher">
    <i class="icon-arrow-left icon-white"></i>
    <span>Style:</span>
    <a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
    <a href="#blue" style="background-color: #2D2F57;"></a>
    <a href="#red" style="background-color: #673232;"></a>
</div>
@section('content');
<div id="content">
</div>
@show
</body>
<script src="{{URL::asset('/js/excanvas.min.js')}}"></script>
<script src="{{URL::asset('/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('/js/jquery.ui.custom.js')}}"></script>
<script src="{{URL::asset('/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('/js/jquery.flot.min.js')}}"></script>
<script src="{{URL::asset('/js/jquery.flot.resize.min.js')}}"></script>
<script src="{{URL::asset('/js/jquery.peity.min.js')}}"></script>
<script src="{{URL::asset('/js/fullcalendar.min.js')}}"></script>
<script src="{{URL::asset('/js/unicorn.js')}}"></script>
<script src="{{URL::asset('/js/unicorn.dashboard.js')}}"></script>
<script src="{{URL::asset('/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{URL::asset('/js/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('/js/jquery.uniform.js')}}"></script>
<script src="{{URL::asset('/js/select2.min.js')}}"></script>
<script src="{{URL::asset('/js/unicorn.form_common.js')}}"></script>
</html>
