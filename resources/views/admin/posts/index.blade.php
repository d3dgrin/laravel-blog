@extends('layouts.admin')

@section('title', $title)

@section('content')

<div class="col-md-12">

    <a href="{{ route('admin.create.post') }}" class="btn btn-primary" style="padding: 10px 30px; margin-bottom: 20px;">Add new post</a>

    @if (count($posts) > 0)

    <h4>All existing posts here. Total: {{ $total }}</h4>

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
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a class="btn btn-success" href="/posts/{{ $post->slug }}">
                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                        View
                    </a>
                    @if(Auth::user()->canPostsAction($post))
                    <a class="btn btn-info" href="posts/{{ $post->id }}/edit">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                    </a>

                    <form id="delete-form" action="posts/{{ $post->id }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Delete post $post->title?');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" name="submit">
                            <i class="glyphicon glyphicon-trash icon-white"></i>
                            Delete
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}

    @else

    <h3>There is no posts yet.</h3>

    @endif

</div>

<script>

</script>

@endsection