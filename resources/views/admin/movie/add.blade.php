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
                            <form action="{{URL::to('/admin/role/add')}}" method="post" class="form-horizontal" />
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
                                <label class="control-label">Radio inputs</label>
                                <div class="controls">
                                    <label><input type="radio" name="0" /> 禁用</label>
                                    <label><input type="radio" name="1" />启用</label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">File upload input</label>
                                <div class="controls">
                                    <input type="file" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">File upload input</label>
                                <div class="controls">
                                    <input type="file" />
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
@endsection

