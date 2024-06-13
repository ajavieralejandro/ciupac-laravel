<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function index(){
        $users = User::paginate(20);
        return view('admin.users.users',["users"=>$users]);
    }

    public function authUser($id){
        $user = User::find($id);
        if($user->is_auth==null)
            $user->is_auth = true;
        else $user->is_auth = !$user->is_auth;
        $user->save();
        $users = User::paginate(20);
        return view('admin.users.users',["users"=>$users]);


    }

    public function storeUser(){
        return view('admin.users.register');
    }
    
}
