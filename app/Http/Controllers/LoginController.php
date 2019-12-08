<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    function verify(Request $request)
    {
        $user = DB::table('users')
                ->where('username', '=', $request->username)
                ->where('password', '=', $request->password)
                ->first();
        
        if($user)
        {
            $request->session()->put('username', $user->username);
            $request->session()->put('userid', $user->id);
            return redirect()->route('home');
        }
        echo 'invalid username or password';
    }

    function destroy(Request $request)
    {
        Session::flush();
        return redirect()->route('root');
    }
}
