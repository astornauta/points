<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // View all users
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    // Store new user
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    // Show specific user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }

    // Update specific user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 202);
    }

    // Delete specific user
    public function delete($id)
    {
        $user  = User::destroy($id);
        return response()->json(204);
    }
}
