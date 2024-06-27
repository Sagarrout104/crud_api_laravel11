<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return $this->successResponse($posts, 'All Posts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return $this->successResponse($post, 'New Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::whereId($id)->first();

        if (!$post) {
            return $this->errorMessage('Data not found', 404);
        }

        return $this->successResponse($post, 'Single Post');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::whereId($id)->first();

        if (!$post) {
            return $this->errorMessage('Data not found', 404);
        }

        $post->update($request->validated());

        return $this->successResponse($post, 'Post Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->first();

        if (!$post) {
            return $this->errorMessage('Data not found', 404);
        }

        $post->delete();

        return $this->successResponse(null, 'Post Deleted');
    }
}
