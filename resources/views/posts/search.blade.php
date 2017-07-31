@extends('layouts.master')

@section('title', 'Search')

@section('content')

<!-- Blog Post Content Column -->
<div class="col-lg-8">

	<h1 class="page-header">
        Search
        <small>results</small>
    </h1>

	<p style="font-size: 20px">Results for searching: {{ $search }}</p>

	<hr>

	@if(count($posts) > 0)

    @foreach($posts as $post)

        @include('posts.post')

    @endforeach

    @else

    <p style="font-size: 30px; color: red;">No results</p>

    @endif

</div>

@endsection