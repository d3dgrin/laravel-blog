<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
		$admin->name = 'admin';
		$admin->display_name = 'Administrator';
		$admin->save();

		$moder = new Role();
		$moder->name = 'moder';
		$moder->display_name = 'Moderator';
		$moder->save();

		$createPost = new Permission();
		$createPost->name         = 'create-post';
		$createPost->display_name = 'Create Posts';
		$createPost->save();

		$editPost = new Permission();
		$editPost->name         = 'edit-post';
		$editPost->display_name = 'Edit Posts';
		$editPost->save();

		$createUser = new Permission();
		$createUser->name         = 'create-user';
		$createUser->display_name = 'Create Users';
		$createUser->save();

		$editUser = new Permission();
		$editUser->name         = 'edit-user';
		$editUser->display_name = 'Edit Users';
		$editUser->save();

		$admin->attachPermission($createPost);
		$admin->attachPermission($editPost);
		$admin->attachPermission($createUser);
		$admin->attachPermission($editUser);

		$moder->attachPermission($createPost);
		$moder->attachPermission($editPost);

		$user = User::find(1);
		$user->attachRole($admin);

		$user2 = User::find(2);
		$user2->attachRole($moder);
    }
}
