@extends('frontend.layout.main')







<body>

@section('content')
<!-- END #fh5co-header -->
<div class="container-fluid">

    <div class="row fh5co-post-entry single-entry">
        <article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
            <figure class="animate-box">
                <img src="{{asset('uploads/images/Blog/'.$data['blog']->image)}}" alt="Image" class="img-responsives" style="height: 500px;width: 1000px">
            </figure>
{{--            <span class="fh5co-meta animate-box"><a href="single.html">Travel</a></span>--}}
            <h2 class="fh5co-article-title animate-box"><a href="single.html">{!!$data['blog']->title  !!}

                </a></h2>

            <div >

                <div class="row">
                    <div class="justify-text animate-box">
                        {!! $data['blog']->description !!}
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>


@endsection

