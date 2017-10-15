<!DOCTYPE HTML>
<html>
<head>
    <title>IT教学视频网</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="node,NODE,node.js,NODE.js,nodejs,IT,it,编程,程序,javascript,java,net,jquery,博客,web,php,xml,web,
IT教学视频网,教学视频网,视频网,视频" />
    <!-- bootstrap -->
    <link href="{{asset('/videos/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css'  />
    <!-- //bootstrap -->
    <link href="{{asset('/videos/css/dashboard.css')}}" rel="stylesheet">
    <!-- Custom Theme files -->
    <link href="{{asset('/videos/css/style.css')}}" rel='stylesheet' type='text/css'  />

    <script type="text/javascript" src="{{asset('/videos/js/modernizr.custom.min.js')}}"></script>
    <link href="{{asset('/videos/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script src="{{asset('/videos/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
    <script src="{{asset('/videos/js/html5media.min.js')}}" type="text/javascript"></script>

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
            <a class="navbar-brand" href="index.html"><h1><img src="{{asset('/videos/images/logo.png')}}" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="top-search">
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                    <input type="submit" value=" ">
                </form>
            </div>
            <div class="header-top-right">
                <div class="signin">
                    <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">注册</a>
                </div>
                <div class="signin">
                    <a href="#small-dialog" class="play-icon popup-with-zoom-anim">登录</a>
                </div>
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
            <img src="images/lines.png" alt="" />
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
    </div>
</div>




<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="show-top-grids">
        <div class="col-sm-8 single-left">
            <div class="song">
                <div class="song-info">
                    <h3>{{$list->video_name}}</h3>
                </div>
the server is not configured as slave; fix in config file or with CHANGE MASTER TO
                <div class="video-grid">
                        <video class="video" poster="{{asset($list->icon)}}" width="628" height="347" controls preload>
                            <source src="{{asset($list->path)}}" media="only screen and (min-device-width: 698px)"></source>
                            <source src="{{asset($list->path)}}" media="only screen and (max-device-width: 698px)"></source>
                            <source src="{{asset($list->path)}}"></source>
                        </video>

6215 2810 0612 9211 

512 228 195 2011 57826    13594803042       59389          24430003   006576      0302   83753703 



  222222  


                </div>
            </div>
162516

            <div class="clearfix"> </div>





        </div>





        <div class="col-md-4 single-right">
            <h3>最新视频</h3>
            <div class="single-grid-right">
                @foreach($recommend as $v)
                <div class="single-right-grids">
                    <div class="col-md-4 single-right-grid-left">
                        <a href="single.html"><img src="{{$v->icon}}" alt="" /></a>
                    </div>
                    <div class="col-md-8 single-right-grid-right">
                        <a href="single.html" class="title"> {{$v->video_name}}</a>
                        <p class="author"><a href="#" class="author">   </a></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="clearfix"> </div>
    </div>

    <!-- //footer -->
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('/videos/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('/video/js/bootstrap.min.js')}}"></script>

<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
</body>
</html>