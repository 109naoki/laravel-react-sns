<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
     public function index()
    {

        $user = DB::table('posts')
        ->join(
                    'users',
                    'posts.user_id',
                    '=',
                    'users.id'
                )
        ->leftJoin(
             'favorites',
                    'posts.id',
                    '=',
                    'favorites.post_id'
        )
        ->select('users.id','posts.content','users.name','posts.id as post_id','favorites.post_id as favorites_id')
         ->orderBy("post_id","desc")
        ->get();
        return $user;
    }

    public function store(Request $request){

        $post = new Post();
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();





          return $post ? response()->json($post,201) : response()->json([],500);
    }

        public function destroy(Post $post)
    {
        \Log::info($post);

          return $post->delete() ? response()->json($post) : response()->json([],500);
    }

}
