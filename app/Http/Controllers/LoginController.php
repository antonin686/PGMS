<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    function verify(Request $req)
    {
        $user = User::where('username', $req->username)
                    ->where('password', $req->password)
                    ->get();
        if(count($user) == 1)
        {
            return redirect()->route('home');
        }

        echo 'invalid username or password';
    }
}
