<?php

namespace App\Http\Controllers;

use App\Img;
use App\Layout;
use App\LayoutImage;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayoutImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
        

        return view('home')->with('imgs', $datas);
    }

    public function root()
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
        
        

        return view('welcomed')->with('imgs', $datas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imgs = Img::all();
        $layouts = Layout::all();
        return view('layoutImage.create')->with('imgs', $imgs)
                                        ->with('layouts', $layouts);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->imgs != null)
        {
            $layout = $request->layout;
            LayoutImage::where('l_id', $layout)->delete();
            
            foreach($request->imgs as $img)
            {
                $layoutImage = new LayoutImage();
                $layoutImage->l_id = $layout;
                $layoutImage->i_id = $img;
                $layoutImage->save();
            }

            return redirect()->route('layout.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LayoutImage  $layoutImage
     * @return \Illuminate\Http\Response
     */
    public function show(LayoutImage $layoutImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LayoutImage  $layoutImage
     * @return \Illuminate\Http\Response
     */
    public function edit(LayoutImage $layoutImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LayoutImage  $layoutImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LayoutImage $layoutImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LayoutImage  $layoutImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(LayoutImage $layoutImage)
    {
        //
    }
}