<?php

namespace App\Http\Controllers;

use App\Img;
use App\Layout;
use App\LayoutImage;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $imgs = DB::table('layout_images')
            ->join('imgs', 'layout_images.i_id', '=', 'imgs.id')
            ->join('layouts', 'layouts.id', '=', 'layout_images.l_id')
            ->where('status', 1)
            ->get();

        $sizes = [
            (object) [ 'width' => '538', 'height' => '640', 'ratio' => '1'],
            (object) [ 'width' => '640', 'height' => '427', 'ratio' => '0.3'],
            (object) [ 'width' => '640', 'height' => '485', 'ratio' => '1.4842'],
            (object) [ 'width' => '640', 'height' => '425', 'ratio' => '0.883'],
            (object) [ 'width' => '640', 'height' => '426', 'ratio' => '0.883'],
            (object) [ 'width' => '640', 'height' => '527', 'ratio' => '0.883'],
            (object) [ 'width' => '640', 'height' => '426', 'ratio' => '0.883'],
        ];

        
        $data = [];
        for ($i=0; $i < count($imgs); $i++) { 
            array_push($data, (object)[
                'id' => $imgs[$i]->i_id,
                'title' => $imgs[$i]->title,
                'path' => $imgs[$i]->path,
                'width' => $sizes[$i]->width,
                'height' => $sizes[$i]->height,
                'ratio' => $sizes[$i]->ratio,
            ]);
        }

        $datas = (object) [
            'data' => $data,
            'l_id' => $imgs[0]->l_id,
            'l_name' => $imgs[0]->name,
        ];

        return view('gallery')->with('imgs', $datas);
    }

    public function show($id)
    {
        $imgs = DB::table('layout_images')
            ->join('imgs', 'layout_images.i_id', '=', 'imgs.id')
            ->join('layouts', 'layouts.id', '=', 'layout_images.l_id')
            ->where('l_id', $id)
            ->get();

        $sizes = [
            (object) [ 'width' => '538', 'height' => '640', 'ratio' => '1'],
            (object) [ 'width' => '640', 'height' => '427', 'ratio' => '0.3'],
            (object) [ 'width' => '640', 'height' => '485', 'ratio' => '1.4842'],
            (object) [ 'width' => '640', 'height' => '425', 'ratio' => '0.883'],
            (object) [ 'width' => '640', 'height' => '426', 'ratio' => '0.883'],
            (object) [ 'width' => '640', 'height' => '527', 'ratio' => '0.883'],
            (object) [ 'width' => '640', 'height' => '426', 'ratio' => '0.883'],
        ];

        
        $data = [];
        for ($i=0; $i < count($imgs); $i++) { 
            array_push($data, (object)[
                'id' => $imgs[$i]->i_id,
                'title' => $imgs[$i]->title,
                'path' => $imgs[$i]->path,
                'width' => $sizes[$i]->width,
                'height' => $sizes[$i]->height,
                'ratio' => $sizes[$i]->ratio,
            ]);
        }

        $datas = (object) [
            'data' => $data,
            'l_id' => $imgs[0]->l_id,
            'l_name' => $imgs[0]->name,
        ];

        return view('gallery')->with('imgs', $datas);
    }
}
