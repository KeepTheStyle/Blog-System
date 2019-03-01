<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('welcome')->with('title', Setting::first()->site_name)->with('categories', Category::take(5)->get())->
        with('post', Post::orderBy('created_at', 'desc')->first())->
        with('posts', Post::orderBy('created_at', 'desc')->skip(1)->take(2)->get())->with('sports', Category::find(1))->
        with('food', Category::find(2))->with('news', Category::find(3))->with('setting', Setting::first());
    }
    public function singlepost($slug){
        $post = Post::where('slug',$slug)->first();
        
        $next = Post::where('id', '>', $post->id)->min('id');
        $pre = Post::where('id', '<', $post->id)->max('id');
        $tags = Tag::all();
        return view('single')->with('post', $post)
        ->with('setting', Setting::first())->with('categories', Category::take(5)->get())->with('next',Post::find($next))->with('pre',Post::find($pre))->with('tags',$tags);
    }
    public function category($slug){
        $category = Category::where('slug',$slug)->first();
        return view('category')->with('category',$category)->with('setting', Setting::first())->with('categories', Category::take(5)->get());
    }
    public function tag($slug){
        $tag = Tag::where('slug',$slug)->first();
       //dd($slug);
        return view('tag')->with('tag',$tag)->with('setting', Setting::first())->with('categories', Category::take(5)->get());
    }
}
