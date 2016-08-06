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
                        <span class="glyphicon glyphicon-lock"></span>修改个人信息</div>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">用户名</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control " value="{{ $user->name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">学号</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sid" value="{{ $user->sid }}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">手机号</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">口号</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="msg" value="{{ $user->msg }}">
                                </div>
                            </div>


<!--
                            <div class="form-group">
                                <label class="col-md-4 control-label">新密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">确认新密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
-->
                            <div class="form-group" style="padding-top: 20px;">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-default">
                                        更改
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
