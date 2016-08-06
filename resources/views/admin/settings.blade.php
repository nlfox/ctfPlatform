@extends('admin/sidebar')

@section('box')
    <link href="{{ asset('bower_components/titatoggle/dist/titatoggle-dist.css') }}" rel="stylesheet">

    <div class="panel panel-default">
        <form action="admin/settings" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel-heading">Settings</div>
            <div class="panel-body">
                <blockquote style="border-left-color: #8699A4">
                    <h4>比赛开关</h4>
                    <div class="checkbox checkbox checkbox-slider--c checkbox-slider-md checkbox-slider-info">
                        <label>
                            <input name="started" type="checkbox"
                                   @if($started)checked="1"@endif><span></span>
                        </label>
                    </div>
                </blockquote>
                <blockquote style="border-left-color: #8699A4">
                    <h4>比赛简介(资词Markdown)</h4>
                    <textarea name="intro" class="form-control" rows="10">{{$intro->value}}</textarea>
                </blockquote>
                <button type="submit" class="btn btn-default">Save</button>
            </div>
        </form>
    </div>
@endsection