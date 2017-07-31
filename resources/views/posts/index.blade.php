@extends('layouts.master')

@section('title', 'Home')

@section('content')

<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="page-header">
        All posts
    </h1>

    @foreach($posts as $post)

        @include('posts.post')

    @endforeach

    {{ $posts->links() }}

</div>

<script id="dsq-count-scr" src="//laravel-blog-test.disqus.com/count.js" async></script>

@endsection