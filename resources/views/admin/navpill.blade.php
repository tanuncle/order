<div class="col-md-2" style="background-color: white">
    <ul class="nav nav-pills nav-stacked ">
        <li role="presentation" {{ $index or '' }}><a href="{{ url('admin') }}">概况</a></li>
        <li role="presentation" {{ $dept or '' }}><a href="{{ url('admin/dept') }}">机构设置</a></li>
        <li role="presentation" {{ $user or '' }}><a href="{{ url('admin/user') }}">员工设置</a></li>
        <li role="presentation" {{ $fee or '' }}><a href="{{ url('admin/fee') }}">餐费设置</a></li>
        {{--<li role="presentation" {{ $permit or '' }}><a href="{{ url('admin/permit') }}">权限设置</a></li>--}}
        <li role="presentation" {{ $role or '' }}><a href="{{ url('admin/role') }}">角色设置</a></li>
        {{--<li role="presentation" {{ $bbs or '' }}><a href="{{ url('admin/bbs') }}">论坛管理</a></li>--}}
        {{--<li role="presentation" {{ $holiday or '' }}><a href="{{ url('common/calendar') }}">假期设置</a></li>--}}
        {{--<li role="presentation" {{ $notice or '' }}><a href="{{ url('admin') }}">发布通知</a></li>--}}
        <li role="presentation" {{ $report or '' }}><a href="{{ url('admin/report') }}">报表管理</a></li>
    </ul>
</div>