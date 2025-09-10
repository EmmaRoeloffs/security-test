<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        // Require login except for viewing and searching
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $data = $request->validate([
            'title' => 'required|max:120',
            'body'  => 'required',
        ]);

        $post = Post::create($data + ['user_id' => auth()->id()]);

        return redirect()->route('posts.index', $post);
    }

    /**
     * Display the specified resource.
     */

    public function show(Post $post)
    {
         $post->load(['comments' => fn($q) => $q->latest()->with('user')]);
        return view('posts.show', compact('post'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Only owner or admin should edit (policy can enforce this later)
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|max:120',
            'body'  => 'required',
        ]);

        $post->update($data);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    /**
     * Vulnerable search method (for SQLi demo).
     * Change to safe Eloquent query after showing exploit.
     */
    public function search(\Illuminate\Http\Request $request)
    {
        // only grab ?q= value, default empty string

        $q = $request->query('q', '');
        // vulnerable raw SQL (string concatenation)
        $rows = DB::select("SELECT * FROM posts WHERE title LIKE '%$q%'");

        // maakt er een collection van Post modellen van
        $posts = Post::hydrate($rows);

        return view('posts.search', compact('posts','q'));
    }

}
