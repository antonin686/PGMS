<?php

namespace App\Http\Controllers;

use App\Img;
use App\Layout;
use App\LayoutImage;
use DB;
use URL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('userid');
        $data = DB::table('api_keys')
                ->join('galleries', 'galleries.a_id', '=', 'api_keys.id')
                ->where('galleries.u_id', $user)
                ->first();
        $datas = (object) [
            'key' => $data->api_key,
            'path' => URL::to('/').'/api/'.$data->api_key,

        ];
        return view('home')->with('api', $datas);
    }
}
