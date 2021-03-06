@extends('layouts.admin')

@section('title', $title)

@section('content')

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h4>Create new user</h4></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="/admin/users/{{ $user->id }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                    <label for="login" class="col-md-4 control-label">Login</label>

                    <div class="col-md-5">
                        <input id="login" type="text" class="form-control" name="login" value="{{ $user->login }}" required>

                        @if ($errors->has('login'))
                            <span class="help-block">
                                <strong>{{ $errors->first('login') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">New Password</label>

                    <div class="col-md-5">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label">Username</label>

                    <div class="col-md-5">
                        <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Email</label>

                    <div class="col-md-5">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    <label for="role" class="col-md-4 control-label">Role</label>

                    <div class="col-md-5">
                        <select name="role" style="width: 150px; height: 30px;" required>
                            @foreach($roles as $role)
                                @if($role->name == $user->getRole()->name)
                                    <option value="{{ $role->id }}" selected="selected">{{ $role->name }}</option>
                                @else
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Edit user
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection