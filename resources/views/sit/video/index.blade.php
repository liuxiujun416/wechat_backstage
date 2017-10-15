<!DOCTYPE HTML>
<html>
<head>
    <title>IT教学视频网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="node,NODE,node.js,NODE.js,nodejs,IT,it,编程,程序,javascript,java,net,jquery,博客,web,php,xml,web,
IT教学视频网,教学视频网,视频网,视频" />
    <!-- bootstrap -->
    <link href="{{asset('/videos/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css'  />
    <!-- //bootstrap -->
    <link href="{{asset('/videos/css/dashboard.css')}}" rel="stylesheet">
    <!-- Custom Theme files -->
    <link href="{{asset('/videos/css/style.css')}}" rel='stylesheet' type='text/css'  />
    <link href="{{asset('/videos/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="{{asset('/videos/js/jquery-1.11.1.min.js')}}"></script>


    <!-- //fonts -->
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><h1><img src="{{URL::asset('/videos/images/logo.png')}}" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="top-search">
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                    <input type="submit" value=" ">
                </form>
            </div>
            <div class="header-top-right">

				
				
				
         @include('sit.video.reg')


				
				
				@include('sit.video.login')
				
				

                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</nav>





<div class="col-sm-3 col-md-2 sidebar">
    <div class="top-navigation">
        <div class="t-menu">MENU</div>
        <div class="t-img">
            <img src="{{asset('videos/images/lines.png')}}" alt="" />
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar">
            @foreach($video_category as $category)
            <li><a href="{{URL('/',array($category->id))}}" class="song-icon">
                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                    {{$category->category_name}}</a>
            </li>
            @endforeach
        </ul>

        <div class="side-bottom">
        </div>
    </div>
</div>



<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">
        <div class="top-grids">
            <div class="recommended-info">
                <h3>Recent Videos</h3>
            </div>
            @foreach($lists as $list)
            <div class="col-md-4 resent-grid recommended-grid slider-top-grids">
                <div class="resent-grid-img recommended-grid-img">
                    <a href="{{URL("single",[$list->video_id])}}"><img src="{{$list->icon}}" alt="" /></a>
                    <div class="time">
                        <p> </p>
                    </div>
                    <div class="clck">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="resent-grid-info recommended-grid-info">
                    <h3><a href="{{URL("single",[$list->video_id])}}"  class="title title-info" >{{$list->video_name}}</a></h3>
                    <ul>
                        <li><p class="author author-info"><a href="{{URL("single",[$list->video_id])}}"  class="author" style="width:200px; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" >{{$list->video_name}}</a></p></li>
                        <li class="right-list"><p class="views views-info">{{$list->hots}}</p></li>
                    </ul>
                </div>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

</body>

 <script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/videos/js/modernizr.custom.min.js')}}"></script>
<script src="{{asset('/videos/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
<script src="{{asset('/videos/js/html5media.min.js')}}" type="text/javascript"></script>
</html>