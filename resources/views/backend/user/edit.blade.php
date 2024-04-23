@extends('backend.layout.backend')

@section('content')
    <div class="col-sm-6 col-md-9 col-lg-9">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">{{$title}}-Form
                    <a href="{{route($route .'index')}}" class="btn btn-success">List</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            {!! Form::model($data['row'],['route' => [$route . 'update',$data['row']->id],'method' => 'put','files' => true]) !!}
            {!! Form::hidden('_method', 'PUT') !!}
            @csrf

            <div class="card-body">
                <div class="form-group row">
                    {!! Form::label('name', 'Name: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                    <br>
                    <div class="col-sm-10">
                        {!! Form::text('name', null, [ 'class'=>'ckeditor form-control', 'placeholder'=>'Enter name','id'=>'summernotes',]); !!}
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    {!! Form::label('email', 'Email: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                    <br>
                    <div class="col-sm-10">
                        {!! Form::text('email', null, [ 'class'=>'ckeditor form-control', 'placeholder'=>'Enter email','id'=>'summernotes',]); !!}
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('type', 'Email: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                    <br>
                    <div class="col-sm-10">
                        {!! Form::text('email', null, [ 'class'=>'ckeditor form-control', 'placeholder'=>'Enter email','id'=>'summernotes',]); !!}
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('status','Status: <span class="required"></span>',['class' => 'col-sm-2 col-form-label'],false); !!}


                    @if($data['row']->type =='0')
                        <div class="form-check form-check-inline">

                            <input type="radio" id="first" name="type" value="0"  checked>
                            <label class="form-check-label ml-2" for="inlineRadio2"> Admin</label><br>
                            <input type="radio" id="first" name="type" value="1" class="form-check-input">
                            <label class="form-check-label ml-2" for="inlineRadio2">User</label><br>

                        </div>

                    @elseif($data['row']->type =='1')
                        <div class="form-check form-check-inline">

                            <input type="radio" id="first" name="type" value="0"  >
                            <label class="form-check-label ml-2" for="inlineRadio2"> Admin</label><br>
                            <input type="radio" id="first" name="type" value="1" class="form-check-input" checked>
                            <label class="form-check-label ml-2" for="inlineRadio2">User</label><br>

                        </div>






                    @else
                        <div class="form-check form-check-inline">

                            <input type="radio" id="first" name="type" value="0"  >
                            <label class="form-check-label ml-2" for="inlineRadio2">Admin</label><br>
                            <input type="radio" id="first" name="type" value="1" class="form-check-input">
                            <label class="form-check-label ml-2" for="inlineRadio2"> User</label><br>
                        </div>
                    @endif



                </div>










            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('csss')
    <style>
        .required{
            color: red;
        }
    </style>
@endsection


