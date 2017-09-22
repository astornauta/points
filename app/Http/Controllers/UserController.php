<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    // Show specific user
    public function show($id)
    {
        return User::findOrFail($id);
    }
}
