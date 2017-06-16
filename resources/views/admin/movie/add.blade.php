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
                                    <input type="file"  name="upload-img" />
                                    <button type="button"  class="btn btn-primary img">upload</button>
                                </div>
                                <div class="controls" id="show-img">
                                    <input type='hidden' name='img' value='' >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">电影</label>
                                <div class="controls">
                                    <input type="file" name="upload" />
                                    <button type="button"  class="btn btn-primary img">upload</button>
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

    <script type="text/javascript">

        $(function(){
            $(".img").on('click',function(){
                var formdata=new FormData($("#data-form")[0]); //获取文件法一

                $.ajax({
                    type : 'post',
                    url : '/admin/movie/upload',
                    data : formdata,
                    cache : false,
                    processData : false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
                    contentType : false, // 不设置Content-type请求头
                    success : function($result){
                        if($result.status) {
                            if($result.type != 'video/mp4') {
                                $('#show-img').html("<img src='" + $result.path + "' ><input type='hidden' name='img' value='" + $result.path + "' >");
                            }else {
                                var html = ' <video width="320" height="240" controls="controls">'+
                                        '<source src="'+ $result.path+'" type="video/avi">'+
                                        '<source src="'+ $result.path+'" type="video/mp4">'+
                                        '</video>';
                                        $('#show-movie').html(html+"<input type='hidden' name='movie_path' value='" + $result.path + "' >");
                            }
                        }
                         alert($result.message);
                    },
                    error : function(){ }
                });
            });
        })

    </script>
@endsection

