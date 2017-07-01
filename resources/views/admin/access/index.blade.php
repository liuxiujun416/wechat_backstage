@extends('admin.layout.layout')
@section('content')
    <div id="content">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>生成一个较深的树</legend>
</fieldset>
        <form action="{{URL('/admin/access/save')}}" method="post">
           <ul id="demo"></ul>
            <button type="submit" class="btn" >update</button>
        </form>
    </div>
<link rel="stylesheet" href="{{URL::asset('/tree/lay/css/layui.css')}}" />
<style type="text/css">
    body{
        height: 1200px;
    }
    #demo{
        margin: 30px 100px;
    }
    .descripttion{
        width: 1000px;
        margin: 50px;
    }
    body>ul{
        display: inline-block;
        width: 400px;
        margin: 20px;
    }
</style>

<script src="{{URL::asset('/tree/layui.js')}}" charset="utf-8"></script>
<script src="{{URL::asset('/js/jquery.min.js')}}"></script>
<script>

    $(function(){
            $.ajax({
                type: "post",
                url: "{{URL("/admin/access/ajax")}}",
                data: {},
                dataType: "json",
                success: function(data){
                    layui.use('tree', function() {
                     var tree = layui.tree({
                     elem: '#demo', //指定元素，生成的树放到哪个元素上
                     check: 'checkbox', //勾选风格
                     skin: 'as', //设定皮肤
                     drag: true,//点击每一项时是否生成提示信息
                     checkboxName: 'aa[]',//复选框的name属性值
                     checkboxStyle: "",//设置复选框的样式，必须为字符串，css样式怎么写就怎么写
                     click: function(item) { //点击节点回调
                     console.log("item")
                     },
                     onchange: function (){//当当前input发生变化后所执行的回调
                     console.log(this);
                     },
                     nodes:data
                     });
                     });
                }
            });
    });
</script>

@endsection