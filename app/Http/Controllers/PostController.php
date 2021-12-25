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

    public function newPost()
    {
        return view('posts.create');
    }

   

    public function editPost(Post $postId)
    {
        // $post = Post::find($postId);
        // $post = Post::findOrFail($postId);
        // $post =  $postId;
        // dd($postId);
        return view('posts.edit', compact('postId'));
    }

    public function insertPost(Request $request)
    {
        $data = self::infoValidation();

        Post::create($data);
        // return redirect('posts/createPostForm');
        return redirect()->route('posts')->with('success', 'با موفقیت ذخیره شد.');
        // return back()->with('success','با موفقیت ذخیره شد.');
        // return back()->withSuccess('با موفقیت ذخیره شد.');
    }

    public function updatePost(Post $postId, Request $request)
    {
        $data = self::infoValidation();
        $postId->update($data);
        return redirect()->route('posts')->with('success', 'با موفقیت ذخیره شد.');
        // return redirect('posts/createPostForm');
        // return back()->with('success','با موفقیت ذخیره شد.');
        // return back()->withSuccess('با موفقیت ذخیره شد.');
    }
    public function deletePost(Post $postId)
    {

        $postId->delete();
        return redirect()->route('posts')->with('success', 'با موفقیت حذف شد.');
        // return redirect('posts/createPostForm');
        // return back()->with('success','با موفقیت ذخیره شد.');
        // return back()->withSuccess('با موفقیت ذخیره شد.');
    }

    public static function infoValidation()
    {
        return request()->validate([
            'title' => 'required|string|min:5|max:200',
            'content' => 'required|string|between:30,1000'
        ]);
    }
}
