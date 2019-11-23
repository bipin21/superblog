<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function all_post(){
        // $posts = Post::with('user','category')->get();
        // return $posts;
        $cat = Category::with('posts')->get();
        return $cat;
    }
}
