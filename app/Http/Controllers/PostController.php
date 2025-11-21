<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'userPosts']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $posts = Auth::user()
                ->posts()
                ->latest()
                ->paginate(5);

        } else {
            $posts = Post::whereNotNull('published_at')
                ->latest()
                ->paginate(5);
        }

        return view('posts.index', compact('posts'));
    }

    public function userPosts($user)
    {
        $posts = Post::where('user_id', $user)
            ->latest()
            ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:20',
        ]);

        if ($request->action === 'publish') {
            $validated['published_at'] = now();
        }

        $post = Auth::user()->posts()->create($validated);

        return redirect()->route('post.show', $post->id)->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:20',
        ]);

        $post->update($validated);

        if ($request->action === 'publish') {
            $post->published_at = now();
            $post->save();

            return redirect()
                ->route('post.show', $post->id)
                ->with('success', 'Post published!');
        }

        return redirect()
            ->route('post.show', $post->id)
            ->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }
}
