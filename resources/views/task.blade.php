@extends('layouts.app')
@section('content')
    <style type="text/css">
        /* task */

        .task i {
            color: white;
            margin-top: 25px;
            font-size: 70px;
        }

        .task h1 {
            margin-top: 10px;
            color: white;
            font-weight: 900;
        }

        .task .info {
            background: #ffffff;
        }

        .task .info i {
            font-size: 15px;
            color: #c2c2c2;
            margin-bottom: 0px;
            margin-top: 10px;
        }

        .task .info h3 {
            font-weight: 900;
            font-size: 22px;
            margin-bottom: 0px;
        }

        .task .info p {
            margin-left: 8px;
            margin-right: 8px;
            margin-bottom: 16px;
            color: #c2c2c2;
            font-size: 12px;
            font-weight: 700;
            word-break: keep-all;
            white-space: nowrap;
            overflow: hidden;

        }

        .pn {
            height: 250px;
            box-shadow: 0 2px 1px rgba(0, 0, 0, 0.2);
        }

        .pn:hover {
            box-shadow: 2px 3px 2px rgba(0, 0, 0, 0.3);

        }

        .centered {
            text-align: center;
        }

        .goleft {
            text-align: left;
        }

        .goright {
            text-align: right;
        }

        .row > h3 {
            font-size: 18px;
        }

        .paddingfix {
            padding-top: 1px;
        }

        .overflowfix {
            max-width: 10px;
            overflow: hidden;
        }

        .panel-body {
            padding: 10px;
        }

    </style>
    <script>

        function getSol() {
            $.ajax({
                url: '/solverecord',
                method: "GET",
                dataType: "json",
                success: function (data) {
                    var solved = $('#solved');
                    var taskName = $('#task-' + data.taskid + ' >h1').text();
                    var solText = data.user + ' solved: ' + taskName;
                    if (solved.text() != solText) {
                        solved.text(solText);
                        solved.addClass('text-info');
                        setTimeout(function () {
                            solved.removeClass('text-info');
                        }, 2000);
                    }
                }
            });
        }
        getSol();
        setInterval(getSol, 10000);

    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="panel panel-default" style="background:rgba(0,0,0,0.8);background: transparent\9;zoom:1\8;">
                    <div class="page-header centered paddingfix">
                        <h1 id="tables">Tasks</h1>
                    </div>

                    <div class="panel-body">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="display: block;padding-bottom: 25px;">
                            <ul id="taskNav" class="nav nav-pills">
                                <li data-index="all"><a href="javascript:void(0)">All</a></li>
                            </ul>
                        </div>


                        @foreach($tasks as $task)
                            <div class="col-lg-3 col-md-4 col-sm-4 mb mix" style="padding-bottom: 25px;">
                                <div class="task pn centered" data-category="{{$task->category}}" data-toggle="modal"
                                     data-target="#myModal-{{$task->id}}" id="task-{{$task->id}}"
                                     style="background: transparent;border:1px solid #D3FBFF;">
                                    <!--<i class="fa fa-check"></i>-->
                                    @if($task->solved)
                                        <i class="glyphicon glyphicon-ok"></i>
                                    @else
                                        <i class="glyphicon glyphicon-download"></i>
                                    @endif
                                    <h1 style="word-break:break-all;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{$task->title}}</h1>
                                    <div class="info" style="background: transparent;">
                                        <div class="row" style="line-height: 1.0;">
                                            <h3 class="centered">{{$task->score}} Pts</h3>
                                            <div class="col-sm-6 col-xs-6 pull-left">
                                                <p class="goleft"><i
                                                            class="glyphicon glyphicon-download"></i>{{$task->category}}
                                                </p>
                                            </div>

                                            <div class="col-sm-6 col-xs-6 pull-right">
                                                @if($task->solved)
                                                    <p class="goright"><i class="glyphicon glyphicon-download"></i>Solved
                                                    </p>
                                                @else
                                                    <p class="goright"><i class="glyphicon glyphicon-download"></i>New
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="myModal-{{$task->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <form action="{{url('/task/check')}}?id={{$task->id}}" method="post"
                                      accept-charset="utf-8" class="modal-dialog">
                                    <div style="display:none">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">{{$task->title}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="msg-1"></div>
                                            <p>
                                                {!! \GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($task->content) !!}
                                            </p>

                                            @if($task->solved==0)
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <input type="text" name="flag" id="flag"
                                                                   class="form-control">
                                                            <span class="input-group-btn">
                                                            <input class="btn btn-default" value="Go" type="submit">
                                                                </input>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <!--start Score Panel -->
                <div class="panel panel-default" style="background:rgba(0,0,0,0.8);background: transparent\9;zoom:1\8;">
                    <div class="page-header centered paddingfix">
                        <h1 id="tables">Notice</h1>
                    </div>

                    <div class="panel-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <p class="list-group-item-text">最新：<span id="solved">Nothing</span></p>
                            </a>
                        </div>
                    </div>
                </div>
                <!--end Score Panel -->

                <!--start Score Panel -->
                <div class="panel panel-default" style="background:rgba(0,0,0,0.8);background: transparent\9;zoom:1\8;">
                    <div class="page-header centered paddingfix">
                        <h1 id="tables">Scores</h1>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>user</th>
                                <th>score</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($i = 0; $i < count($scores); $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td class="overflowfix">{{$scores[$i]->name}}</td>
                                    <td>{{$scores[$i]->score}}</td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end Score Panel -->
                <script>
                    categoryList = Array();
                    var task = $('.task');
                    task.each(
                            function () {
                                if ($.inArray($(this).data('category'), categoryList) < 0) {
                                    categoryList.push($(this).data('category'));
                                }
                            }
                    );
                    //console.log(categoryList);
                    var nav = $("#taskNav");
                    categoryList.forEach(
                            function (e) {
                                var item = '<li data-index="' + e + '"><a href="javascript:void(0)">' + e + '</a></li>';
                                nav.append(item);
                            }
                    );
                    nav.find('li').click(
                            function () {
                                var index = $(this).data('index');
                                if (index != 'all') {
                                    task.each(function () {
                                        $(this).parent().hide(500);
                                        if ($(this).data('category') == index) {
                                            $(this).parent().show(500);
                                        }
                                    });
                                }
                                else {
                                    task.each(function () {
                                        $(this).parent().show(500);
                                    });
                                }
                            }
                    );

                </script>
            </div>
        </div>
    </div>

@endsection
