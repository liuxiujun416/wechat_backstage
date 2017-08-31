<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="My  LG, SonyErricsson, Motorola web design" />
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
                <div class="file">
                    <a href="upload.html">Upload</a>
                </div>
                <div class="signin">
                    <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Sign Up</a>
                    <!-- pop-up-box -->

                    <!--//pop-up-box -->
                    <div id="small-dialog2" class="mfp-hide">
                        <h3>Create Account</h3>
                        <div class="social-sits">
                            <div class="facebook-button">
                                <a href="#">Connect with Facebook</a>
                            </div>
                            <div class="chrome-button">
                                <a href="#">Connect with Google</a>
                            </div>
                            <div class="button-bottom">
                                <p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
                            </div>
                        </div>
                        <div class="signup">
                            <form>
                                <input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number" />
                            </form>
                            <div class="continue-button">
                                <a href="#small-dialog3" class="hvr-shutter-out-horizontal play-icon popup-with-zoom-anim">CONTINUE</a>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div id="small-dialog3" class="mfp-hide">
                        <h3>Create Account</h3>
                        <div class="social-sits">
                            <div class="facebook-button">
                                <a href="#">Connect with Facebook</a>
                            </div>
                            <div class="chrome-button">
                                <a href="#">Connect with Google</a>
                            </div>
                            <div class="button-bottom">
                                <p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
                            </div>
                        </div>
                        <div class="signup">
                            <form>
                                <input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
                                <input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                <input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number" />
                                <input type="submit"  value="Sign Up"/>
                            </form>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div id="small-dialog7" class="mfp-hide">
                        <h3>Create Account</h3>
                        <div class="social-sits">
                            <div class="facebook-button">
                                <a href="#">Connect with Facebook</a>
                            </div>
                            <div class="chrome-button">
                                <a href="#">Connect with Google</a>
                            </div>
                            <div class="button-bottom">
                                <p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
                            </div>
                        </div>
                        <div class="signup">
                            <form action="upload.html">
                                <input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
                                <input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                <input type="submit"  value="Sign In"/>
                            </form>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div id="small-dialog4" class="mfp-hide">
                        <h3>Feedback</h3>
                        <div class="feedback-grids">
                            <div class="feedback-grid">
                                <p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
                            </div>
                            <div class="button-bottom">
                                <p><a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign in</a> to get started.</p>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="signin">
                    <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign In</a>
                    <div id="small-dialog" class="mfp-hide">
                        <h3>Login</h3>
                        <div class="social-sits">
                            <div class="facebook-button">
                                <a href="#">Connect with Facebook</a>
                            </div>
                            <div class="chrome-button">
                                <a href="#">Connect with Google</a>
                            </div>
                            <div class="button-bottom">
                                <p>New account? <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Signup</a></p>
                            </div>
                        </div>
                        <div class="signup">
                            <form>
                                <input type="text" class="email" placeholder="Enter email / mobile" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?"/>
                                <input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                <input type="submit"  value="LOGIN"/>
                            </form>
                            <div class="forgot">
                                <a href="#">Forgot password ?</a>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
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
            <img src="{{asset('videos/images/lines.png')}}" alt="" />
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar">
            <li class="active"><a href="index.html" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li><a href="shows.html" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>TV Shows</a></li>
            <li><a href="history.html" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>History</a></li>
            <li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Movies<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
            <li><a href="#" class="menu"><span class="glyphicon glyphicon-film glyphicon-king" aria-hidden="true"></span>Sports<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>

            <li><a href="movies.html" class="song-icon"><span class="glyphicon glyphicon-music" aria-hidden="true"></span>Songs</a></li>
            <li><a href="news.html" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>News</a></li>
        </ul>

        <div class="side-bottom">
            <div class="copyright">
                <p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
            </div>
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
                    <a href="{{URL("video/single",[$list->video_id])}}"><img src="{{$list->icon}}" alt="" /></a>
                    <div class="time">
                        <p>3:04</p>
                    </div>
                    <div class="clck">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="resent-grid-info recommended-grid-info">
                    <h3><a href="single.html" class="title title-info">{{$list->name}}</a></h3>
                    <ul>
                        <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                        <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                    </ul>
                </div>
            </div>
            @endforeach

            <div class="clearfix"> </div>
        </div>

    </div>

</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
</body>
</html>