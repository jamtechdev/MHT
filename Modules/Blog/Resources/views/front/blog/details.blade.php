@extends(config('blog.front_defaultLayout'))
@section('seo')
<meta name="title" content="{{ (isset($blog)&& $blog['seo_title']!='') ? $blog['seo_title'] : 'blog' }}" />
<meta name="description" content="{{ (isset($blog)&& $blog['meta_description']!='') ? $blog['meta_description'] : 'blog' }}" />
<meta name="keywords" content="{{ (isset($blog)&& $blog['blog_meta_keyword']!='')  ? $blog['blog_meta_keyword'] : 'blog' }}" />
@stop
@push('styles')
 <link href="{{ config('content-builder.content_css') }}" rel="stylesheet" type="text/css" />

<style>
    .is-container {
        padding: 10px 0;
    }
    .header-section {
        border-bottom: 1px solid black;
        padding: 10px 0;
        display: flex;
        flex-direction: column;
    }
    .posted-date {
        text-align: right;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="header-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admins/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog-front::blog.list') }}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $blog['title'] }}</li>
            </ol>
        </nav>
        <h1 class="text-left m-2">{{ $blog['title'] }}</h1>
        <div class="blog-title-image center">
            @if (!$blog['featured_image'])
            <img class="card-img-top" src="{{ asset('assets/admin/images/default.jpg') }}" alt="No Image Available" style="width:800px; height:400px">
            @else
            <img class="card-img-top" src="{{ $blog['featured_image'] }}" alt="{{ $blog['title'] }}" style="width:800px; height:400px">
            @endif
        </div>
        <div class="posted-date">
            <span>
                <i class="fas fa-calendar text-primary"></i><span class="ms-3">Posted on</span><a href="#" rel="bookmark" class="ms-2"><time datetime="{{ $blog['created_at'] }}">{{ $blog['created_at']->format('M d, Y') }}</time></a>
            </span>
        </div>

    </div>

    <div class="content-builder-data">
        {!! $blog['description'] !!}
    </div>
</div>
@endsection
