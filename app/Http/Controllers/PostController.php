<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class PostController extends Controller implements HasMiddleware
{

    //MIDDLEWARE CONNECTIONS
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $fields = $request->validate([ 
        'title' => 'required|max:255',
        'body' => 'required|max:525',
    ]);

     $request-> user() -> posts()->create($fields);

    return ["message" => "Post Created Successufully"];
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post)
    {
        return $post;       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {   
        $fields = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
    ]);

    $post->update($fields);

    return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return['message'=>'this post was deleted'];
    }
}
