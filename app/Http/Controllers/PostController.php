<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        // $posts = Post::latest();
        // if(request('search')){
        //     $posts->where('title', 'like', '%'.request('search').'%')
        //           ->orWhere('body', 'like', '%' . request('search') . '%')
        //           ->orWhere('excerpt', 'like', '%' . request('search') . '%');
        // }
        $title = "";
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'Category: ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = 'By: ' . $author->name;
        }
        return view('posts', [
            "title" => 'All Posts ' . $title,
            "active" => "posts",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(4)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Detail Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
