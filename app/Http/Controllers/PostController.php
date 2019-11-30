<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Image;

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
            'description' => 'required|min:2|max:5000',
        ]);
        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->photo)->resize(300,200);
        $upload_path = public_path().'/uploadImage/';
        $img->save($upload_path.$name);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->photo = $name;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::User()->id;
        $post->save();
        return ['message' => 'OK'];
    }
    //
    public function delete_post($id){
        $post = Post::find($id);
        $upload_path = public_path().'/uploadImage/';
        $image = $upload_path.$post->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $post->delete();
        return ['message' => 'OK'];
    }
    //
    public function edit_post($id){
        $post = Post::find($id);    
        return response()->json(['posts' => $post],200);
    }
    //
    public function update_post(Request $request,$id){
        $post = Post::find($id);
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);
        if($request->photo!=$post->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/uploadImage/";
            $image = $upload_path. $post->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $post->photo;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->save();
    }
}
