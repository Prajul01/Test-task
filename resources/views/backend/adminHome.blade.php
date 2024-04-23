<?php //phpinfo(); ?><!---->

@extends('backend.layout.backend')

@section('csss')


@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @forelse (auth()->user()->unreadNotifications as $notification)
                    <div class="alert alert-info">
                        {{ $notification->data['message'] }}
                        <a href="{{ route('notifications.read', $notification->id) }}" class="close" aria-label="Close">&times;</a>
s
                    </div>
                @empty
                    <div class="alert alert-info">
                        No notifications.
                    </div>
                @endforelse

                {{--                <div class="col-lg-3 col-6">--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-info">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{$data['blog']}}</h3>--}}

{{--                            <p>Total Blogs</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-bag"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- ./col -->
{{--                <div class="col-lg-3 col-6">--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-success">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{$data['admin']}}<sup style="font-size: 20px"></sup></h3>--}}

{{--                            <p>Total Admin</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-stats-bars"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$data['user']}}</h3>

                            <p> Registered User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@section('jss')

    @endsection
