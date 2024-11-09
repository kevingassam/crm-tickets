<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //api
    public function index(){
        $users = User::get();
        return response()->json($users);
    }

    public function destroy($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message'=>'Utilisateur introuvable'],404);
        }
        $user->delete();
        return response()->json(['message'=>'Utilisateur supprimé'],200);
    }
}
