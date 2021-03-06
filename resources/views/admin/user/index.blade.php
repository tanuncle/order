@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @component('admin.navpill',[ 'user' => 'class=active'])

            @endcomponent

            <div class="col-md-9">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="{{ url('admin/user') }}">列表</a></li>
                    <li role="presentation" ><a href="{{ url('admin/user/create') }}">新增</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-md-offset-0">
                <div class="panel panel-info">
                    <!--<div class="panel-heading">概况</div>-->

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="col-md-12">
                                <form action="{{ url('admin/user/search') }}" class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <label for="dept">部门</label>
                                        <select name="dept" id="dept" class="form-control">
                                            <option value=""></option>
                                            @foreach($depts as $dept)
                                                @if($dept->id == old('dept'))
                                                    <option value="{{ $dept->id }}" selected>{{ $dept->name }}</option>
                                                @else
                                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">姓名</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">搜索</button>
                                    </div>
                                </form>
                            </div>

                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>姓名</th>
                                    <th>用户名</th>
                                    <th>所属部门</th>
                                    <th>餐费标准</th>
                                    <th>角色</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->dept->name or '' }}</td>
                                    <td>早餐：{{$user->price->breakfast or ''}} 午餐：{{$user->price->lunch or ''}} 晚餐：{{$user->price->dinner or ''}}
                                        <a href="{{ url('admin/user/price/'.$user->id.'/edit') }}" class="btn btn-default">更改</a>
                                    </td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            {{ $role->name }} ;
                                            @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-info">编辑</a>
                                        <form action="{{ url('admin/user/'.$user->id) }}" method="post" style="display: inline">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="button" onclick="__del(this)" class="btn btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('layer/layer.js') }}"></script>
    <script>
        //删除单条记录提示确认
        function __del(obj) {
            layer.confirm('确认删除？',function (index) {
                obj.parentNode.submit();
                layer.close(index);
                layer.load(1);
            });
        }
    </script>
@endsection