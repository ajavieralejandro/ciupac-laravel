<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;

class UserLocationController extends Controller
{
    public function index()
    {
        $users = User::with('locations')->get();

        $locations = Location::all();
        return view('assign-locations', compact('users', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'locations' => 'array',
            'locations.*' => 'exists:locations,id',
        ]);

        $user = User::find($request->user_id);
        $user->locations()->sync($request->locations);

        return redirect()->route('assign.locations')->with('success', 'Locaciones asignadas correctamente.');
    }
}
