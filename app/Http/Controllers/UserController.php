<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    function register(Request $req){
        $user = new User;
        $user->first_name = $req->input('first_name');
        $user->last_name = $req->input('last_name');
        $user->email = $req->input('email');
        $user->address = $req->input('address');
        $user->password = $req->input('password');
        $user->save();
        return $user;
    }
    function login(Request $req){
        $user = User::where('email',$req->email)->first();
        if(!$user || ($user->password != $req->password)){
            return ["error"=>"user email or password not match !!!"];
        }
        return $user;
    }
}
