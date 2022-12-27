<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function authentication(){
        $auth = Auth::id();

        return $auth;
    }



    public function show(User $user){





         return response()->json(['user' => $user,'post' => $user->posts()->get()]);
    }
}
