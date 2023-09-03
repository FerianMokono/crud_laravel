<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $donnees = Post::all();

        return response()->json($donnees);
    }

    public  function store(CreateRequest $request) {

        $post = new Post();

        $post->titre = $request->titre;
        $post->description = $request->description;

        $post->save();

        return response()->json([
            'status_code' =>200,
            'status_message' => 'le post a été  crée',
            'data' =>$post
        ]);
    }
}