@extends(config('blog.front_defaultLayout'))
@section('seo')
<meta name="title" content="{{ (isset($blog) && $blog['seo_title']!='') ? $blog['seo_title'] : 'blog' }}" />
<meta name="description" content="{{ (isset($blog) && $blog['meta_description']!='') ? $blog['meta_description'] : 'blog' }}" />
<meta name="keywords" content="{{ (isset($blog) && $blog['blog_meta_keyword']!='')? $blog['blog_meta_keyword'] : 'blog' }}" />
@stop
@push('styles')
    <style type="text/css">
        .card-deck {
          display:flex;
         }
    .card-img-top {
        object-fit: cover;
        object-fit: position;
        max-width: 320px;
        width: 100%;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }
    .card-body {
        .card-title {
            font-weight: bold;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            font-weight: bold;
            -webkit-line-clamp: 1;
        }
    }
    p.card-text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    </style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="card-deck">
                    <a class="card m-3" href="{{ route('blog-front::blog.details', $blog['slug']) }}">
                        @if (!$blog['featured_image'])
                        <img class="card-img-top" src="{{ asset('assets/admin/images/default.jpg') }}" alt="{{ $blog['title'] }}">
                        @else
                        <img class="card-img-top" src="{{ $blog['featured_image'] }}" alt="{{ $blog['title'] }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog['title'] }}</h5>
                            <p class="card-text">{{ $blog['short_description'] }}</p>
                            <span class="card-text">
                                <small class="text-muted"><time datetime="{{ $blog['created_at'] }}">{{ $blog['created_at']->format('M d, Y') }}</time></small>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
