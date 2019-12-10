<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Img;
use App\http\Resources\ImageResource;
use App\GalleryImage;
use App\Api_Key;
use App\Gallery;
use DB;
use URL;

class Api_keyController extends Controller
{
    public function index($api_key)
    {
        
        $imgs = DB::table('gallery_images')
        ->join('imgs', 'imgs.id', '=', 'gallery_images.i_id')
        ->join('galleries', 'galleries.id', '=', 'gallery_images.g_id')
        ->join('layouts', 'layouts.id', '=', 'galleries.l_id')
        ->join('api_keys', 'api_keys.id', '=', 'galleries.a_id')
        ->where('api_keys.api_key', $api_key)
        ->get();
        
        $sizes = [
            (object) [ 'width' => '20%', 'height' => '200', 'ratio' => '1'],
            (object) [ 'width' => '40%', 'height' => '200', 'ratio' => '0.3'],
            (object) [ 'width' => '30%', 'height' => '200', 'ratio' => '1.4842'],
            (object) [ 'width' => '30%', 'height' => '200', 'ratio' => '0.883'],
            (object) [ 'width' => '20%', 'height' => '200', 'ratio' => '0.883'],
            (object) [ 'width' => '30%', 'height' => '200', 'ratio' => '0.883'],
            (object) [ 'width' => '20%', 'height' => '200', 'ratio' => '0.883'],
            (object) [ 'width' => '20%', 'height' => '200', 'ratio' => '0.883'],
            (object) [ 'width' => '30%', 'height' => '200', 'ratio' => '0.883'],
        ];
        
        $data = [];
        for ($i=0; $i < count($imgs); $i++) { 
            array_push($data, (object)[
                'id' => $imgs[$i]->i_id,
                'title' => $imgs[$i]->title,
                'path' => URL::to('/').'/'.$imgs[$i]->path,
                'width' => ($imgs[0]->l_id == '2') ? $sizes[$i]->width : 300,
                'height' => ($imgs[0]->l_id == '2') ? $sizes[$i]->height : 300,
                //'ratio' => $sizes[$i]->ratio,
            ]);
        }

        $datas = (object) [
            'data' => $data,
            'l_id' => $imgs[0]->l_id,
            'l_name' => $imgs[0]->name,
        ];

        return new ImageResource($datas);
    }
}
