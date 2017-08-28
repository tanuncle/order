@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked ">
                <li role="presentation" class="active"><a href="{{ url('user') }}">概况</a></li>
                <li role="presentation"><a href="{{ url('user/breakfast') }}">用餐设置</a></li>
                <li role="presentation"><a href="{{ url('user/info') }}">用餐流水</a></li>
                <li role="presentation"><a href="{{ url('user/comment') }}">管理</a></li>
            </ul>
        </div>

        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">概况</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-12">
                        <p>
                            <strong>本人餐费标准</strong>
                            <label> 早餐：</label>10.00
                            <label> 午餐：</label>15.00
                            <label> 晚餐：</label>10.00
                        </p>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <label>月份：</label>
                        <select>
                            <option>2017-08</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <h4>天数</h4>
                        <div class="col-md-4 text-center"><h2>3</h2></div>
                        <div class="col-md-4 text-center"><h2>4</h2></div>
                        <div class="col-md-4 text-center"><h2>8</h2></div>
                        <div class="col-md-4 text-center"><label>早餐</label></div>
                        <div class="col-md-4 text-center"><label>午餐</label></div>
                        <div class="col-md-4 text-center"><label>晚餐</label></div>
                    </div>

                    <div class="col-md-12">
                        <h4>费用</h4>
                        <div class="col-md-4 text-center"><h2>110.00</h2></div>
                        <div class="col-md-4 text-center"><h2>285.00</h2></div>
                        <div class="col-md-4 text-center"><h2>60.00</h2></div>
                        <div class="col-md-4 text-center"><label>早餐</label></div>
                        <div class="col-md-4 text-center"><label>午餐</label></div>
                        <div class="col-md-4 text-center"><label>晚餐</label></div>
                        <label>费用合计：</label>385.00 元
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection