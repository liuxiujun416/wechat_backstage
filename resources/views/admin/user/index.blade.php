@extends('admin.layout.layout')
@section('content')
    <div id="content">
        <div id="content-header">
            <h1>Tables</h1>
            <div class="btn-group">
                <a class="btn btn-large tip-bottom" title="Manage Files" href="/admin/role/add"><i class="icon-file"></i></a>
                <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
                <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
                <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#" class="current">Tables</a>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
                            <h5>Static table with checkboxes in box with padding</h5>
                            <span class="label label-info">Featured</span>
                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered table-striped with-check">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
                                    <th>编号</th>
                                    <th>角色民称</th>
                                    <th>创建时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($list))
                                    @foreach($list as $value)
                                        <tr>
                                            <td><input type="checkbox" /></td>
                                            <td>{{$value['role_id']}}</td>
                                            <td>{{$value['role_name']}}</td>
                                            <td>{{ date('Y-m-d H:i',$value['created']) }}</td>
                                            <td>{{$value['status']}}</td>
                                            <td> <a href="{{URL('/admin/access/add')}}" class="btn" >权限</a>
                                                <a href="{{URL('/admin/access/add')}}" class="btn" >添加用户</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
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
<script src="{{URL::asset('js/jquery.uniform.js')}}"></script>
<script src="{{URL::asset('js/select2.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('js/unicorn.js')}}"></script>
<script src="{{URL::asset('js/unicorn.tables.js')}}"></script>