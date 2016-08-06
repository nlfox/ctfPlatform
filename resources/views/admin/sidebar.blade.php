@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">

                    <div class="panel-heading">Sidebar</div>

                    <div class="panel-body">
                        {!!
                        \Bootstrapper\Facades\Navigation::pills([
                            [
                                'title' => 'Post',
                                'link' => url('admin/post')
                            ],

                            [
                                'title' => 'Task',
                                'link' => url('admin/task')
                            ],
                            [
                                'title' => 'Game Settings',
                                'link' => url('admin/settings')
                            ]

                        ])->stacked()
                        !!}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('box')
            </div>
        </div>
    </div>
@endsection