<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }
}
