@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @component('admin.navpill',[ 'role' => 'class=active'])

            @endcomponent

            <div class="col-md-9">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="{{ url('admin/role') }}">列表</a></li>
                    <li role="presentation" ><a href="{{ url('admin/role/create') }}">新增</a></li>
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
                                <form action="{{ url('admin/role') }}" class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <label for="name">角色</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                                    </div>
                                    {{--<div class="form-group">
                                        <label for="dept">权限</label>
                                        <select name="dept" id="dept" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>--}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">搜索</button>
                                    </div>
                                </form>
                            </div>

                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>角色</th>
                                    <th>权限</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($roles) > 0)
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach($role->permissions as $permission)
                                                    {{ $permission->name }};
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/role/'.$role->id.'/edit') }}" class="btn btn-info">编辑</a>
                                                <form action="{{ url('admin/role/'.$role->id) }}" method="post" style="display: inline">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                    <button type="button" onclick="__del(this)" class="btn btn-danger">删除</button>
                                                </form>
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