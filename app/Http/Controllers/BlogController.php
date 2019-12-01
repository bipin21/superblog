<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //
    public function get_all_blog_post(){
        $posts = Post::with('user','category')->orderBy('id','desc')->get();
        return response()->json([
            'blogpost'=>$posts
        ],200);
    }
     // 
     public function getpost_by_id($id){
        $posts = Post::with('user','category')->where('id',$id)->first();
        return response()->json([
            'post'=>$posts
        ],200);
    }
     // get_all_category
     public function get_all_category(){
        $categories = Category::all();
        return response()->json([
            'categories'=>$categories
        ],200);
    }
}
