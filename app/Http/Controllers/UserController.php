<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('Admin.users.index', compact('users'));
    }
}