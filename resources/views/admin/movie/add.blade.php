@extends('admin.layout.layout')
@section('content')
    <div id="content">
        <div id="content-header">
            <h1>电影</h1>
            <div class="btn-group">
                <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
                <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
                <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
                <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>系统设置</a>
            <a href="#" class="tip-bottom">角色管理</a>
            <a href="#" class="current">添加角色</a>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                            <h5>添加角色</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{URL::to('/admin/movie/add')}}" method="post" id="data-form" class="form-horizontal" enctype="multipart/form-data" />
                            <div class="errors">
                                @if(isset($errors) && count($errors)>0)
                                    <div class="box-body">
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-ban"></i>错误：</h4>
                                            @foreach($errors->all() as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>

                                    </div>
                                @endif
                            </div>

                            <div class="control-group">
                                <label class="control-label">电影名称</label>
                                <div class="controls">
                                    <input type="text" data-color="#000000" name="movie_name"  class=" input-small" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">状态</label>
                                <div class="controls">
                                    <label><input type="radio" name="status"  value="0" /> 禁用</label>
                                    <label><input type="radio" name="status" selected="true"  value="1" />启用</label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">图片</label>
                                <div class="controls">
                                    <button type="button" class="btn btn-primary"  id="select-img">select file</button>
                                    <button type="button"  class="btn btn-primary load-file">upload</button>
                                </div>
                                <div class="controls" id="show-img">
                                    <input type='hidden' name='img' value='' >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">电影</label>
                                <div class="controls">
                                    <button type="button" class="btn btn-primary" id="select-movie" >select file</button>
                                    <button type="button"  class="btn btn-primary load-file">upload</button>
                                </div>
                                <div class="controls" id="show-movie">
                                    <input type='hidden' name='movie_path' value='' >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-primary">Return</button>
                                </div>
                            </div>
                            </form>
                            <form id="upload-img" class="form-horizontal" enctype="multipart/form-data"  style="display: none; " >
                                <input type="file" name="upload-img" id="upload-file-img" />
                            </form>
                            <form id="upload-movie" class="form-horizontal" enctype="multipart/form-data"  style="display: none; " >
                                <input type="file" name="upload-movie" id="upload-file-movie" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div id="footer" class="span12">
                    2012 &copy; UniAdmin.</div>
            </div>
        </div>
    </div>

    <script src="{{URL::asset('/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('/js/ajaxfileupload.js')}}"></script>
    <script type="text/javascript">

        $(function(){

            var file_id = '';
            $("#select-img").click(function(){
                $("#upload-file-img").click();
                file_id = 'upload-file-img';
            });

            $("#select-movie").click(function(){
                $("#upload-file-movie").click();
                file_id = 'upload-file-movie';
            });



            $(".load-file").click(function () {
                ajaxFileUpload();
            })



            function ajaxFileUpload() {
                var formData = new FormData();
                formData.append("file", document.getElementById(file_id).files[0]);
                $.ajax({
                    url: '/admin/movie/upload',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function ($result) {
                        if($result.status) {

                            if($result.type == 'image/jpeg') {
                                $('#show-img').html("<img src='" + $result.path + "' ><input type='hidden' name='img' value='" + $result.path + "' >");
                            } else {
                                var html = ' <video width="700" height="300" controls="controls">' +
                                        '<source src="' + $result.path + '" type="video/avi">' +
                                        '<source src="' + $result.path + '" type="video/mp4">' +
                                        '</video>';
                                $('#show-movie').html(html + "<input type='hidden' name='movie_path' value='" + $result.path + "' >");
                            }
                        }
                    },
                    error: function () {
                        alert("上传失败！");
                        $("#imgWait").hide();
                    }
                });
            }













        function ajaxFileUpload1() {
            $.ajaxFileUpload
            (
                    {
                        url: '/admin/movie/uploadmovie', //用于文件上传的服务器端请求地址
                        secureuri: false, //是否需要安全协议，一般设置为false
                        fileElementId: file_id, //文件上传域的ID
                        dataType: 'json', //返回值类型 一般设置为json
                        success: function ($result, status)  //服务器成功响应处理函数
                        {
                            if($result.status) {

                                if($result.type == 'image/jpeg') {
                                    $('#show-img').html("<img src='" + $result.path + "' ><input type='hidden' name='img' value='" + $result.path + "' >");

                                } else {

                                    var html = ' <video width="320" height="240" controls="controls">' +
                                            '<source src="' + $result.path + '" type="video/avi">' +
                                            '<source src="' + $result.path + '" type="video/mp4">' +
                                            '</video>';
                                    $('#show-movie').html(html + "<input type='hidden' name='movie_path' value='" + $result.path + "' >");
                                }
                            }
                        },
                        error: function (data, status, e)//服务器响应失败处理函数
                        {
                            alert(e);
                        }
                    }
            )
            file_id = '';
            return false;

        }
      })

    </script>
@endsection

