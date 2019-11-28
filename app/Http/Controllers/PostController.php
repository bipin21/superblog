<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    //
    public function all_post(){
        // $posts = Post::with('user','category')->get();
        // return $posts;
        $posts = Post::with('user','category')->orderBy('id','desc')->get();
        return response()->json([
            'posts'=>$posts
        ],200);
    }
    //
    public function add_post(Request $request){
        $this->validate($request,[
            'title' => 'required|min:2|max:50',
            // 'description' => 'required|min:20|max:5000',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        // $post->photo = $request->photo;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::User()->id;
        $post->save();
        return ['message' => 'OK'];
    }
    //
    public function delete_post($id){
        $post = Post::find($id);
        $post->delete();
        return ['message' => 'OK'];
    }
    //
    public function edit_post($id){
        $post = Post::find($id);    
        return response()->json(['category' => $category],200);
    }
    //
    public function update_post(Request $request,$id){
        $this->validate($request,[
            'cat_name' => 'required|min:2|max:50'
        ]);
        $post = Post::find($id);    
        $post->cat_name = $request->cat_name;
        $post->save();
        return ['message' => 'OK'];
    }
}
