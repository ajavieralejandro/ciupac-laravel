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
    
}
