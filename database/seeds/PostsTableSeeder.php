<?php

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('login', 'admin')->first();
        $moder = User::where('login', 'moder')->first();

        $posts = [
            [
                'title' => 'Moder post',
                'slug' => str_slug('Moder post'),
                'text' => '<p>Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. </p><p>Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. </p>',
                'image' => 'moder-post.jpg',
                'user_id' => $moder->id,
            ],
            [
                'title' => 'Admin post',
                'slug' => str_slug('Admin post'),
                'text' => '<p>Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. </p><p>Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. </p>',
                'image' => 'admin-post.jpg',
                'user_id' => $admin->id,
            ],
        	[
        		'title' => 'Magic post',
        		'slug' => str_slug('Magic post'),
        		'text' => '<p>Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. </p><p>Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. </p>',
        		'image' => 'magic-post.jpg',
        		'user_id' => $moder->id,
        	],
        	[
        		'title' => 'Simple post',
        		'slug' => str_slug('Simple post'),
        		'text' => '<p>Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. </p><p>Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. Simple text fo my post. </p>',
        		'image' => 'simple-post.jpg',
        		'user_id' => $admin->id,

        	],
        ];

        foreach ($posts as $post) {
        	Post::create($post);
        }
    }
}
