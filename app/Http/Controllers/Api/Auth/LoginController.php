<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{

    public function register(Request $request)
{
$validatedData = $request->validate([
'name' => 'required|string|max:255',
                   'email' => 'required|string|email|max:255|unique:users',
                   'password' => 'required|string|min:8',
  ]);

      $user = User::create([
              'name' => $validatedData['name'],
                   'email' => $validatedData['email'],
                   'password' => Hash::make($validatedData['password']),
       ]);

$token = $user->createToken('auth_token')->plainTextToken;

return response()->json([
              'access_token' => $token,
                   'token_type' => 'Bearer',
]);
}
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return response()->json(Auth::user());
        // }
        if (!Auth::attempt($request->only('email', 'password'))) {
return response()->json([
'message' => 'Invalid login details'
           ], 401);
       }

$user = User::where('email', $request['email'])->firstOrFail();

$token = $user->createToken('auth_token')->plainTextToken;

return response()->json([
           'access_token' => $token,
           'token_type' => 'Bearer',
]);

       return response()->json([],401);
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return response()->json(true);
}
}
