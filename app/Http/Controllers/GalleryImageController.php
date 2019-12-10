<?php

namespace App\Http\Controllers;

use App\Img;
use App\GalleryImage;
use App\Layout;
use App\Gallery;
use App\Catagory;
use App\Subcatagory;
use DB;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->session()->get('userid');
        
        $imgs = DB::table('gallery_images')
        ->join('imgs', 'imgs.id', '=', 'gallery_images.i_id')
        ->join('galleries', 'galleries.id', '=', 'gallery_images.g_id')
        ->join('layouts', 'layouts.id', '=', 'galleries.l_id')
        ->where('galleries.u_id', $user)
        ->get();
        
        $sizes = [
            (object) [ 'width' => '340', 'height' => '411', 'ratio' => '1'],
            (object) [ 'width' => '340', 'height' => '457', 'ratio' => '0.3'],
            (object) [ 'width' => '318', 'height' => '640', 'ratio' => '1.4842'],
            (object) [ 'width' => '340', 'height' => '577', 'ratio' => '0.883'],
            (object) [ 'width' => '340', 'height' => '426', 'ratio' => '0.883'],
            (object) [ 'width' => '340', 'height' => '426', 'ratio' => '0.883'],
            (object) [ 'width' => '340', 'height' => '596', 'ratio' => '0.883'],
            (object) [ 'width' => '340', 'height' => '494', 'ratio' => '0.883'],
            (object) [ 'width' => '340', 'height' => '558', 'ratio' => '0.883'],
        ];
        
        $data = [];
        
        for ($i=0; $i < count($imgs); $i++) { 
            array_push($data, (object)[
                'id' => $imgs[$i]->i_id,
                'title' => $imgs[$i]->title,
                'path' => $imgs[$i]->path,
                'width' => ($imgs[0]->l_id == '2') ? $sizes[$i]->width : 300,
                'height' => ($imgs[0]->l_id == '2') ? $sizes[$i]->height : 300,
                'ratio' => $sizes[$i]->ratio,
            ]);
        }

        $datas = (object) [
            'data' => $data,
            'l_id' => $imgs[0]->l_id,
            'l_name' => $imgs[0]->name,
            'g_id' => $imgs[0]->g_id,
        ];

        $layouts = Layout::all();

        return view('galleryImage.index')->with('imgs', $datas)->with('layouts', $layouts);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $imgs = Img::where('u_id', $request->session()->get('userid'))->get();
        $layouts = Layout::all();

        $catagories = Catagory::all();
        $subCatagories = SubCatagory::all();

        $datas = [];

        foreach ($catagories as $catagory) {
            $subcata = [];   
            foreach ($subCatagories as $sub) {

                if ($sub->c_id == $catagory->id) {
                    $data = [];
                    $sc = 0;
                    foreach ($imgs as $img) {

                        if ($sub->id == $img->subCatagory) {
                            $data[] = $img;
                            $sc++;
                        }
                    }
                    if (!empty($data)) {
                        $subcata[] = [
                            'sub_name' => $sub->name,
                            'data' => $data,
                        ];
                    }
                }

            }
            
            if(!empty($subcata))
            {
                $datas[] = [
                    'cata_name' => $catagory->name,
                    'sub_data' => $subcata,
                ];
            }
            
        }

        return view('galleryImage.create')->with('datas', $datas)->with('layouts', $layouts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->session()->get('userid');

        if($request->images != null)
        {

            
            $gal = Gallery::where('u_id', $user)->first();
            $gal->l_id = $request->layout;
            $gal->save();
         
            $galleryImages = GalleryImage::where('g_id', $gal->id)->get();
            
            foreach ($galleryImages as $gallery) {
                $gallery->delete();
            }

            foreach($request->images as $image)
            {
                $gallery = new GalleryImage();
                $gallery->g_id = $gal->id;
                $gallery->i_id = $image;
                $gallery->save();
            }

            return redirect()->route('galleryImage.index');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $gallery = Gallery::find($request->g_id)->first();
        $gallery->l_id = $request->layout;
        $gallery->save();
        return redirect()->route('galleryImage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryImage $galleryImage)
    {
        //
    }
}