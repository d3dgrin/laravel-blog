<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Users';

        $total = User::all()->count();

        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('title', 'users', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create new user';

        $roles = Role::all();

        return view('admin.users.create', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'login' => 'required|string|unique:users',
            'username' => 'required|string|unique:users',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
            'role' => 'required',
        ]);

        $user = User::create([
            'login' => request('login'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        $user->attachRole(request('role'));

        return redirect()->route('admin.users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'Edit user';

        $roles = Role::all();

        return view('admin.users.edit', compact('title', 'user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'login' => 'required|string|unique:users,login,'.$user->id,
            'username' => 'required|string|unique:users,username,'.$user->id,
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user->login = request('login');
        $user->username = request('username');
        $user->email = request('email');

        if(request('password') !== null)
        {
            $user->password = bcrypt(request('password'));
        }

        $user->save();

        $user->detachRole($user->getRole());
        $user->attachRole(request('role'));

        return redirect()->route('admin.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users');
    }
}
