<?php

namespace App\Http\Controllers;

use App\Img;
use App\Layout;
use App\LayoutImage;
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
        //
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
