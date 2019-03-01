<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /** public function __construct()
    *{
    *    $this->middleware('auth');
   * }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/admin/home')->with('posts',Post::all())->with('categories',Category::all()->count())->with('users', User::all()->count())->with('trashed',Post::onlyTrashed()->get()->count());
    }
}
