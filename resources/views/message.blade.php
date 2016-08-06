@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if($stat == 1)
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <h4 >Bingo!</h4>
                        <p>{{ $msg }}</p>
                        <p>
                            <a href="{{url('/'.$url)}}"><button type="button" class="btn btn-default">Go Back</button></a>
                        </p>
                    </div>
                @else
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <h4 >{{$msg}}</h4>
                        <p>Please Try Again</p>
                        <p>
                            <a href="{{url('/'.$url)}}"><button type="button" class="btn btn-default">Go Back</button></a>
                        </p>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection