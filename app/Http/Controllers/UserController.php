<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with('user')
            ->latest()
            ->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function show()
    {
        return view('posts.show');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function save(Request $request)
    {
        User::query()->create($request->all());
        return redirect()->route('client.index');
    }
}
