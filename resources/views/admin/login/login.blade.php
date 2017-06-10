<!DOCTYPE html>
<html lang="en">
<head>
    <title>登录页面_很简洁漂亮的Bootstrap响应式后台管理系统模板UniAdmin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-responsive.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/unicorn.login.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/unicorn.login.js') }}"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="logo">
    <img src="img/logo.png" alt="" />
</div>
<div id="loginbox">
    <form id="loginform" class="form-vertical" method="post" action="{{url('admin/login/login')}}" onsubmit="return false;"  />
    <p>输入用户名和密码继续.</p>
    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span><input type="text" name="user" placeholder="用户名" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="pwd"  placeholder="密码" />
            </div>
        </div>
    </div>
    <div class="form-actions">
        <span class="pull-left"><a href="#" class="flip-link" id="to-recover">忘记密码?</a></span>
        <span class="pull-right"><input type="button" id="but-submit"  class="btn btn-inverse" value="登录" /></span>
    </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical" />
    <p>请输入正确的邮箱地址，我们将发送验证邮件.</p>
    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>
    </div>
    <div class="form-actions">
        <span class="pull-left"><a href="#" class="flip-link" id="to-login">&lt; 返回登录</a></span>
        <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Recover" /></span>
    </div>
    </form>
</div>
   <script type="text/javascript" >
       $("#but-submit").on('click',function() {
           $.post("{{url('/admin/login/login')}}", $("#loginform").serialize(), function (result) {
               alert(result['message']);
               document.location.href=result['url'];
           })
       });
   </script>

</body>
</html>
