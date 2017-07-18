@extends('layouts.admin')

@section('title', $title)

@section('content')

<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th style="width: 400px;">Title</th>
                <th>Author</th>
                <th>Date created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->login }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a class="btn btn-success" href="/posts/{{ $post->id }}">
                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                        View
                    </a>
                    <a class="btn btn-info" href="posts/{{ $post->id }}/edit">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                    </a>
                    <a class="btn btn-danger" href="posts/{{ $post->id }}" 
                        onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                        <i class="glyphicon glyphicon-trash icon-white"></i>
                        Delete
                    </a>
                    <form id="delete-form" action="posts/{{ $post->id }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection