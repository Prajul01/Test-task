
@extends('frontend.layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row fh5co-post-entry">
            @foreach($data['row'] as $blog)
                <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                    <figure>
                        <a href="{{route('single',$blog->id)}}"><img src="{{asset('uploads/images/Blog/'.$blog->image)}}" alt="Image"  style="height: 350px;width: 400px ;border-radius: 10px"></a>
                    </figure>
                    <h2 class="fh5co-article-title"><a href="{{route('single',$blog->id)}}">{!! $blog->title !!}</a></h2>
                </article>
            @endforeach
        </div>
    </div>

@endsection

