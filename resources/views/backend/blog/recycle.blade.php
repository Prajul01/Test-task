@extends('backend.layout.backend')
@section('title')
    Blog | Recycle
@endsection
@section('content')
    <div class="col-sm-6 col-md-9 col-lg-9">
        <div class="carbbd">
{{--            @if(Session::has('success'))--}}
{{--                <p class="alert alert-success">{{Session::get('success')}}</p>--}}
{{--            @endif--}}
{{--            @if(Session::has('error'))--}}
{{--                <p class="alert alert-danger">{{Session::get('danger')}}</p>--}}
{{--            @endif--}}
{{--            @if(Session::has('warning'))--}}
{{--                <p class="alert alert-warning">{{Session::get('warning')}}</p>--}}
{{--            @endif--}}
        </div>
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">{{$title}}
                    <a href="{{route($route .'create')}}" class="btn btn-success">Create</a>
                    <a href="{{route($route .'index')}}" class="btn btn-secondary">{{$panel}} List</a>
                </h3>
            </div>



            <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>

                    <th>Sn</th>
                    <th>Title</th>
                    <th>Description</th>
{{--                    <th>Status</th>--}}
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data['row'] as $i=>$cat)
                    <tr>
                        <td>{{$i+1}} </td>
                        <td>{!!$cat->title!!}</td>
                        <td>{!! $cat->description !!}</td>

                        <td>
                            <img src="{{asset('uploads/images/Blog/'.$cat->image)}}"  alt="" style="height: 100px; width: 100px; boarder:15px" >
                        </td>

                        <td>
                            {!! Form::open(['route' => [$route . 'restore',$cat->id,],'method'=>'POST']) !!}
                            {{ Form::button('<i class="fa fa-recycle"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] ) }}
                            {!! Form::close() !!}
                            <br>
                            {!! Form::open(['route' => [$route . 'forceDelete',$cat->id,],'method'=>'DELETE']) !!}
                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) }}
                            {!! Form::close() !!}
                        </td>


                    </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center;"><p class="text-danger">No Data Found </p> </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

