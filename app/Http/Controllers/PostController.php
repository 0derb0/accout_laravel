<?php

namespace App\Http\Controllers;

use App\Actions\Post\EditPostAction;
use App\Actions\Post\StorePostAction;
use App\Helpers\AlertHelper;
use App\Http\Requests\Post\SearchPostRequest;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\EditPostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search(SearchPostRequest $request)
    {
        $param = $request->validated()['param'];

        $posts = Post::query()
            ->select('posts.id', 'posts.title', 'users.name', 'users.surname')
            ->join('users', 'user_id', '=', 'users.id')
            ->where('posts.title', 'like', "%{$param}%")
            ->orWhere('users.name', 'like', "%{$param}%")
            ->orWhere('users.surname', 'like', "%{$param}%")
            ->orderBy('title')
            ->paginate(15);

        return view('posts.index', [ 'posts' => $posts ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::select('posts.id', 'title', 'users.name', 'users.surname')
            ->join('users', 'user_id', '=', 'users.id')
            ->orderBy('title')
            ->paginate(15);

        // dd($posts);

        return view('posts.index', [ 'posts' => $posts ]);
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
    public function store(StorePostRequest $request, StorePostAction $storePost, AlertHelper $alert)
    {
        $storePost($request->validated(), new Post);
        
        $alert('Пост успешно создан');
        return redirect(route('posts.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post, 'previous_page' => url()->previous()]);
    }

    public function showMine()
    {
        $mine_posts = Post::select('id', 'title')
            ->where('user_id', '=', Auth::id())
            ->orderBy('title')
            ->paginate(15);

        return view('posts.showMine', ['posts' => $mine_posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post, 'previous_page' => url()->previous()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostRequest $request, Post $post, EditPostAction $editPost)
    {
        $editPost($request->validated(), $post);

        return redirect(route('posts.showMine'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(url()->previous());
    }
}
