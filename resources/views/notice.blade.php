@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @foreach($notices as $notice)
                    <div class="alert alert-warning alert-dismissible fade in" role="alert" style="background:rgba(0,0,0,0.8);background: transparent\9;zoom:1\8;">
                        <h3>{{ $notice->title }}</h3>
                        <hr style="border-width: 1px;border-color: white;">
                        <p>{!! \GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($notice->content) !!} </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection