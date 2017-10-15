
<div class="signin">
    <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">注册</a>
    <!-- pop-up-box -->
    <script type="text/javascript" src="js/modernizr.custom.min.js"></script>
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--//pop-up-box -->
    <div id="small-dialog2" class="mfp-hide">
        <h3>注册帐号</h3>
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
            <form  method="post" action="{{URL('/reg')}}" >
                <input type="text" name="teller_name" class="email" placeholder="请输入Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="请输入email"/>
                <input type="password" name="teller_pass" placeholder="请输入密码" required="required" pattern=".{6,}" title="最少6位字符" autocomplete="off" />
                <input type="password" name="confirm_teller_pass" class="confirm_password" placeholder="请输入确认密码" pattern="..{6,}"  title="最少6位字符" />
                <input type="submit"  value="注册"/>
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
    <div id="small-dialog5" class="mfp-hide">
        <h3>Help</h3>
        <div class="help-grid">
            <p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
        </div>

    </div>


    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });
    </script>
</div>