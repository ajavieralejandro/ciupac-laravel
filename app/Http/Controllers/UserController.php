<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Basura;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
    public function userCarga(){
        return view('users');
    }

    public function userDashboard(){
        $user = Auth::user();
        $mediciones = Basura::where('user_id','=',$user->id)->with('localidad')->paginate(10);

        return view('admin.users.dashboard',compact('mediciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usersIndex');
    }
    
}
