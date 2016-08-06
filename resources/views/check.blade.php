@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                        @if($msg == 1)
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <h4 id="oh-snap!-you-got-an-error!">Bingo!<a class="anchorjs-link" href="#oh-snap!-you-got-an-error!"><span class="anchorjs-icon"></span></a></h4>
                                <p>Love the feeling?</p>
                                <p>
                                    <a href="{{url('/task')}}"><button type="button" class="btn btn-default">Go Back</button></a>
                                </p>
                            </div>
                        @else
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <h4 id="oh-snap!-you-got-an-error!">Wrong Flag<a class="anchorjs-link" href="#oh-snap!-you-got-an-error!"><span class="anchorjs-icon"></span></a></h4>
                                <p>Please Try Again</p>
                                <p>
                                    <button type="button" class="btn btn-default" onclick="history.back()">Go Back</button>
                                </p>
                            </div>
                        @endif

            </div>
        </div>
    </div>
@endsection
