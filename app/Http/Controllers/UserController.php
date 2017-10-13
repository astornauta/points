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
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255|confirmed',
            'username' => 'required|max:255|unique:users',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'avatar' => '',
        ]);
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
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'password' => 'required|max:255|confirmed',
            'username' => 'required|max:255|unique:users,username,'.$id,
            'birth_date' => 'required|date|date_format:Y-m-d',
            'avatar' => '',
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 202);
    }

    // Delete specific user
    public function delete($id)
    {
        $user  = User::destroy($id);
        return response()->json(204);
    }

    public function showUsersReceivedPoints(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $points = $user->receivedPoints()->get();

        return response()->json($points, 200);
    }

    public function showUsersGivenPoints(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $points = $user->givenPoints()->get();

        return response()->json($points, 200);
    }
}
