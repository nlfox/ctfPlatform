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
        .paddingfix{
            padding-top: 1px;
            text-align: center;
        }
    </style>
    <div class="container auth">
        <div class="row">



            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-lock"></span>登录</div>
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
                        <form class="form-horizontal" role="form" action="{{ url('/login') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-3 control-label">
                                    邮件</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-md-3 control-label">
                                    密码</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"/>
                                            记住密码
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-default btn-sm">
                                        登录</button>
                                    <button type="reset" class="btn btn-success btn-sm">
                                        重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        没有账号？ <a href="{{ url('/register') }}">去注册</a></div>
                </div>
            </div>


        </div>
    </div>

@endsection

