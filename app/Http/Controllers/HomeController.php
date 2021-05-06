<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('title','!=','')->orderBy('created_at','desc')->get();
        $count = Post::where('title','!=','')->count();
        
        return view('welcome', compact('posts', 'count'));
    }

    public function home()
    {
        $user = User::find(Auth::id());

        //$posts = Post::where('title','!=','')->orderBy('created_at','desc')->get();
        //$count = Post::where('title','!=','')->count();

        $posts = $user->home()->where('title','!=','')->orderBy('created_at','desc')->get();
        $count = $user->home()->where('title','!=','')->count();

        //return view('posts.index', compact('posts', 'count'));
        
        return view('index', compact('posts', 'count'));
    }
}
