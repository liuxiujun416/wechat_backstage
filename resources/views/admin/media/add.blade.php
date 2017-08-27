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
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i></a>
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
                            <form action="{{URL::to('/admin/media/add')}}" method="post" id="data-form" class="form-horizontal" enctype="multipart/form-data" />
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
                                <label class="control-label">title</label>
                                <div class="controls">
                                    <input type="text" data-color="#000000" name="title"  class=" input-small" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">状态</label>
                                <div class="controls">
                                    <label><input type="radio" name="status"  value="0" /> 禁用</label>
                                    <label><input type="radio" name="status" checked="checked"  value="1" />启用</label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">图片</label>
                                <div class="controls">
                                    <button type="button" class="btn btn-primary"  id="select-img">select file</button>
                                    <button type="button"  data-url="{{URL::to('/admin/media/upload')}}"  class="btn btn-primary load-file">upload</button>
                                </div>
                                <div class="controls" id="show-img">
                                    <input type='hidden' name='media_element_id' value='' >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">图片</label>
                                <div class="controls">
                                    <textarea id="editor" name="content" ></textarea>
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
    <script type="text/javascript">

        $(function() {

            var file_id = '';
            $("#select-img").click(function () {
                $("#upload-file-img").click();
                file_id = 'upload-file-img';
            });

            $("#select-movie").click(function () {
                $("#upload-file-movie").click();
                file_id = 'upload-file-movie';
            });


            $(".load-file").click(function () {
                var url =  $(this).attr('data-url');
                ajaxFileUpload(url);
            })


            function ajaxFileUpload(url) {
                var formData = new FormData();
                formData.append("file", document.getElementById(file_id).files[0]);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function ($result) {
                        if ($result.status) {
                                $('#show-img').html("<img src='" + $result.path + "' /><input type='hidden' name='media_element_id' value='"+$result.media_element_id+"' />");

                        }
                        alert($result.message);
                    },
                    error: function () {
                        alert("上传失败！");
                        $("#imgWait").hide();
                    }
                });
            }
        })

    </script>
@endsection

<script src="{{URL::asset('/ueditor/ueditor.config.js')}}"></script>
<script src="{{URL::asset('/ueditor/ueditor.all.min.js')}}"></script>
<script src="{{URL::asset('/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>

