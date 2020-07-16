<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->get();
        return view('profile', compact('user'));
    }
}
