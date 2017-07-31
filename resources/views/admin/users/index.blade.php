@extends('layouts.admin')

@section('title', $title)

@section('content')

<div class="col-md-12">

    <a href="{{ route('admin.create.user') }}" class="btn btn-primary" style="padding: 10px 30px; margin-bottom: 20px;">Add new user</a>

    @if (count($users) > 0)

    <h4>All existing users here. Total: {{ $total }}</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Login</th>
                <th>Role</th>
                <th>Registration date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->login }}</td>
                <td>{{ $user->getRole()->display_name }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a class="btn btn-info" href="users/{{ $user->id }}/edit">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                    </a>

                    <form id="delete-form" action="users/{{ $user->id }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Delete user {{ $user->username }}?');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" name="submit">
                            <i class="glyphicon glyphicon-trash icon-white"></i>
                            Delete
                        </button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

    @else

    <h3>There is no users yet.</h3>

    @endif

</div>

<script>

</script>

@endsection