<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;
class FavoriteController extends Controller
{

    public function index(){

        $favorite = DB::table('favorites')
        ->get();

        return response()->json(['favorite' => $favorite]);
    }
       public function store(Request $request, $id)
   {
           Auth::user()->favorite($id);
           return response()->json(["status" => "like"]);
   }

   public function destroy($id)
   {
           Auth::user()->unfavorite($id);
            return response()->json(["status" => "unlike"]);
   }
}
