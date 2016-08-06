@extends('layouts.app')

@section('content')
    <link href="{{ asset('/css/auth.css') }}" rel="stylesheet">
    <style>
        body {
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .panel-default {
            opacity: 0.9;
            margin-top:30px;
        }
        .form-group.last { margin-bottom:0px; }
    </style>
    <div class="container auth">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-lock"></span>注册</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">用户名</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="UserName">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">学号</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sid" value="{{ old('sid') }}" placeholder="201400001">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">电子邮件地址</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">手机号</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="手机号">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">口号</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="msg" value="{{ old('msg') }}" placeholder="输入你的口号，例如：Poi！">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">确认密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group" style="padding-top: 20px;">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-default">
                                        注册
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-footer">
                        已有账号？ <a href="{{ url('/login') }}">去登录</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection