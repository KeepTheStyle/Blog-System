<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Auth;
class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $user = Auth::user()->id;
        $posts = Post::where('user_id', $user)->get();
        return view('admin.posts.posts')->with('posts',$posts);
    }
    public function allposts()
    {  
        return view('admin.posts.allposts')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $user_id = Auth::user()->id;
        $tags =  Tag::where('user_id',$user_id)->get();
        if(count($categories)==0){
            Session::flash('info',"You can't create a post until you have some categories!");
            return redirect()->back();
        }
        if(count($tags)==0){
            Session::flash('info',"You can't create a post until you have some tags!");
            return redirect()->back();
        }
        return view('/admin/posts/create')->with('categories',
            Category::all())->with('tag',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'category_id' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'tags' =>'required']
        );
        $user = Auth::user()->id;
        //dd($user);
         $path_img = $request->featured;
         $featured_new_name = time().$path_img->getClientOriginalName();
         $path_img->move('uploads/posts',$featured_new_name);
         $newpath = 'uploads/posts/'.$featured_new_name;
         $post = Post::create([
            'title' =>$request->title,
            'content' =>$request->content,
            'category_id' =>$request->category_id,
            'img_path' =>$newpath,
             'slug' => str_slug($request->title),
             'user_id' => $user
        ]);
        $post->tags()->attach($request->tags);
        Session::flash('success','your post has been successfully inserted!');
        return redirect()->back(); 
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
    public function edit($id)
    {
        $post = Post::find($id);
        $user_id = Auth::user()->id;
        $tags = Tag::where('user_id',$user_id)->get;
        return view('admin.posts.edit')->with('post',$post)->with('categories',
             Category::all())->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {           
                $this->validate($request,[
                    'title' => 'required|max:255',
                    'category_id' => 'required',
                    'content' => 'required',
                    'tags' =>'required']
                );
                $post = Post::find($id);
                if($request->hasFile('featured')){
                    $path_img = $request->featured;
                    $featured_new_name = time().$path_img->getClientOriginalName();
                    $path_img->move('uploads/posts',$featured_new_name);
                    $newpath = 'uploads/posts/'.$featured_new_name;
                    $post->img_path = $newpath;
                }

                $post->title = $request->title;
                $post->category_id = $request->category_id;
                $post->content = $request->content;
                $post->slug = str_slug($request->title);
                $post->save();
                $post->tags()->sync($request->tags);
                Session::flash('success','Post updated!');

                return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $post = Post::find($id);
    $post->delete();
    Session::flash('success','your post has been successfully trashed!');

    return redirect()->back();
    }
    public function trashed(){
        $id = Auth::user()->id;
        $posts = Post::onlyTrashed()->where('user_id', $id)->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }
    public function alltrashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.alltrashed')->with('posts',$posts);
    }
    public function kill($id){
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->Forcedelete();
        Session::flash('success','your post has been permanently deleted!');
        return redirect()->back();
    }
    public function restore($id){
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();
        Session::flash('success','your post has been restored!');
        return redirect()->back();

    }
}
