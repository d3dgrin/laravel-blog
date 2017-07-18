@extends('layouts.master')

@section('title', 'Home')

@section('content')

<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="page-header">
        Some posts
        <small>bitcheeeeees</small>
    </h1>

    @foreach($posts as $post)

        @include('posts.post')

    @endforeach

    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>

</div>

@endsection