<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image, Auth, File;

use App\Models\Post;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Posts';

        $total = Post::all()->count();

        $posts = Post::latest()->paginate(10);

        return view('admin.posts.index', compact('title', 'posts', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create post';

        return view('admin.posts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|unique:posts',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'text' => 'required'
        ]);

        /*

        $photo = request('image');

        $filename  = time() . '.' . $photo->getClientOriginalExtension();

        if( ! is_dir(public_path('img/posts')) )
        {
            mkdir(public_path('img/posts'), 0777, true);
        }

        $path = public_path('img/posts/' . $filename);

        Image::make($photo->getRealPath())->resize(900, 300)->save($path);

        */

        $filename = str_slug(request('title')).'.'.request('image')->getClientOriginalExtension();

        request('image')->move(public_path('img/posts'), $filename);

        Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'image' => $filename,
            'text' => request('text'),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.posts');
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
    public function edit(Post $post)
    {
        if(!Auth::user()->canPostsAction($post))
        {
            return redirect()->route('admin.panel');
        }

        $title = 'Edit post';

        return view('admin.posts.edit', compact('title', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|unique:posts,title,'.$post->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'text' => 'required'
        ]);

        $post->title = request('title');
        $post->text = request('text');

        /*
        if(request()->hasFile('image'))
        {
            $photo = request('image');

            $filename  = time() . '.' . $photo->getClientOriginalExtension();

            if( ! is_dir(public_path('img/posts')) )
            {
                mkdir(public_path('img/posts'), 0777, true);
            }

            $path = public_path('img/posts/' . $filename);

            Image::make($photo->getRealPath())->resize(900, 300)->save($path);

            $post->image = $filename;
        }
        */

        if(request()->hasFile('image'))
        {
            File::delete('img/posts/' . $post->image);

            $filename = str_slug(request('title')).'.'.request('image')->getClientOriginalExtension();

            request('image')->move(public_path('img/posts'), $filename);

            $post->image = $filename;
        }

        $post->save();

        return redirect()->route('admin.posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        File::delete('img/posts/' . $post->image);
        
        $post->delete();

        return redirect()->route('admin.posts');
    }
}
