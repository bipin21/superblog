<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function get_all_blog_post()
    {
        $posts = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $posts,
        ], 200);
    }
    //
    public function getpost_by_id($id)
    {
        $posts = Post::with('user', 'category')->where('id', $id)->first();
        return response()->json([
            'post' => $posts,
        ], 200);
    }
    // get_all_category
    public function get_all_category()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
        ], 200);
    }
    //get_all_post_by_cat_id
    public function get_all_post_by_cat_id($id)
    {
        $posts = Post::with('user', 'category')->where('cat_id', $id)->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $posts,
        ], 200);
    }
    public function latest_post()
    {
        $posts = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $posts,
        ], 200);
    }
    public function search_post()
    {
        $search = \Request::get('s');
        if($search!=null){
            $posts = Post::with('user', 'category')
            ->where('title','LIKE',"%$search%")
            ->orWhere('description','LIKE',"%$search%")
            ->get();
            return response()->json([
                'posts' => $posts,
            ], 200);
        }
        else{
            return $this->get_all_blog_post();
        }
    }
}
