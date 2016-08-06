@extends('layouts.app')

@section('content')
    <link href="{{ asset('/css/auth.css') }}" rel="stylesheet">
    <style>
        .panel-default {
            opacity: 0.9;
            margin-top: 30px;
        }

        .form-group.last {
            margin-bottom: 0px;
        }
    </style>
    <div class="container auth">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-lock"></span>修改任务
                    </div>
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
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url($prefix.'/edit?id='.$id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @foreach($fields as $field)
                                @if ($field != 'content')
                                    <div class="form-group">

                                        <label class="col-md-4 control-label">{{$field}}</label>
                                        <div class="col-md-6">

                                            <input type="text" name="{{$field}}" class="form-control "
                                                   value="{{ $task->$field }}">

                                        </div>

                                    </div>
                                @endif
                            @endforeach
                            <div class="form-group">
                                <label class="col-md-4 control-label">content</label>
                                <div class="col-md-6">
                                    <textarea name="content" class="form-control" rows="10"
                                              style="border: 1px dotted #fff;" rows="10">{{$task->content}}</textarea>
                                </div>
                            </div>

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