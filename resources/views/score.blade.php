@extends('layouts.app')

@section('content')
    <div class="container">
    <style>
        .paddingfix{
            padding-top: 1px;
            text-align: center;
        }
    </style>
        <div class="row">
            <div class="col-md-10 col-md-offset-2 ">
                <div class="col-md-10">
                    <div class="panel panel-default table-responsive" style="background:rgba(0,0,0,0.8);background: transparent\9;zoom:1\8;" >
                        <div class="page-header centered paddingfix" >
                            <h1 id="tables">Scores</h1>
                        </div>
                        <div class="panel-body">
                            <div class="bs-component">
                                <table class="table table-striped table-hover ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>用户名</th>
                                        <th>分</th>
                                        <th>口号</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i = 0; $i < count($scores); $i++)
                                    <tr>
                                        <td>{{ $page*10+$i+1 }}</td>
                                        <td>{{ $scores[$i]->name }}</td>
                                        <td>{{ $scores[$i]->score }}</td>
                                        <td>{{ $scores[$i]->msg }}</td>
                                    </tr>
                                    @endfor


                                    </tbody>
                                </table>
                            </div>

                            <nav>
                                <ul class="pager">
                                    @if($page > 0)
                                        <li><a href="score?page={{$page-1}}">Previous</a></li>
                                    @endif
                                    @if( count($scores) == 10 )
                                        <li><a href="score?page={{$page+1}}">Next</a></li>
                                    @endif
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
