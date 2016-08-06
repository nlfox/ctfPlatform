@extends('admin/sidebar')

@section('box')
    <div class="panel panel-default">
        <div class="panel-heading">Home
            <a class="btn btn-sm btn-success pull-right" href="{{url($prefix.'/add')}}" style="padding: 1px 10px;">
                Add
            </a>
        </div>


        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>

                <tr>
                    <th>#</th>
                    @foreach($fields as $key => $value)
                        <th>{{$key}}</th>
                    @endforeach
                    <th>edit</th>
                </tr>


                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        @foreach($fields as $key => $value)
                            <td>{{$item->$value}}</td>
                        @endforeach
                        <td nowrap>
                            <a class="btn btn-sm btn-info" href="{{url($prefix.'/edit?id='.$item->id)}}" style="padding: 1px 10px;">
                                Edit
                            </a>
                            <a class="btn btn-sm btn-danger" href="{{url($prefix.'/del?id='.$item->id)}}" style="padding: 1px 10px;">
                                Del
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>



        </div>
    </div>
@endsection