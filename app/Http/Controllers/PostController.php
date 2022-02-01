<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all()->sortByDesc('id');
        // return view('posts.index', [
        //     'posts' => $posts
        // ]);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }



    public function edit(Post $post)
    {
        // $post = Post::find($postId);
        // $post = Post::findOrFail($postId);
        // $post =  $postId;
        // dd($postId);
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $data = self::infoValidation();

        Post::create($data);
        // return redirect('posts/createPostForm');
        return redirect()->route('posts.index')->with('success', 'با موفقیت ذخیره شد.');
        // return back()->with('success','با موفقیت ذخیره شد.');
        // return back()->withSuccess('با موفقیت ذخیره شد.');
    }

    public function update(Post $post, Request $request)
    {
        $data = self::infoValidation(); 
        if ($post->image) {
            deleteFile($post->image);
        }
        $post->update($data);
        return redirect()->route('posts.index')->with('success', 'با موفقیت ذخیره شد.');
        // return redirect('posts/createPostForm');
        // return back()->with('success','با موفقیت ذخیره شد.');
        // return back()->withSuccess('با موفقیت ذخیره شد.');
    }

    public function show(Post $post)
    {
        return view('posts.post', compact('post'));
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            deleteFile($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'با موفقیت حذف شد.');
        // return redirect('posts/createPostForm');
        // return back()->with('success','با موفقیت ذخیره شد.');
        // return back()->withSuccess('با موفقیت ذخیره شد.');
    }

    public static function infoValidation()
    {
        $data = request()->validate([
            'title' => 'required|string|min:5|max:200',
            'content' => 'required|string|between:30,1000',
            'image' => 'nullable|image|max:10000'
        ]);
        $data['image'] = uploadImage($data['image']);;
        return $data;
    }
}
