<?php

namespace App\Http\Controllers;

use App\Img;
use App\Catagory;
use App\SubCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgs = Img::where('u_id', 1)->get();
        return view('image.index')->with('imgs', $imgs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cata = Catagory::all();
        $subcata = Subcatagory::all();
        
        return view('image.create')->with('cata', $cata)
                                    ->with('sub', $subcata);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        //error_log('cdasda'.$request->catagory);
        $name = time().'.'.$file->getClientOriginalExtension();
        $file->move('uploads', $name);
        
        $img = new Img();
        $img->title = $file->getClientOriginalName();
        $img->desc = "Image";
        $img->catagory = $request->catagory;
        $img->subCatagory = $request->subCatagory;
        $img->path = 'uploads/'.$name ;
        $img->u_id = 1;
        $img->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Img  $img
     * @return \Illuminate\Http\Response
     */
    public function show(Img $img)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Img  $img
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $img = Img::find($id);
        //dd($id);
        return view('image.edit')->with('img', $img);
                                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Img  $img
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img = Img::find($id);
        //dd($request->all());
        
        $newImg = Image::make($img->path);
        $newImg->rotate(-$request->rotate);

        if($request->cropCheck != null)
        {
            $x = round($request->cropX);
            $y = round($request->cropY);
            $w = round($request->cropWidth);
            $h = round($request->cropWidth);
            
            $newImg->crop( $w, $h, $x, $y);
            $newImg->resize( $w, $h);
        }

        $path = 'uploads/'.time().'.jpg';
        $newImg->save($path);
        File::delete($img->path);
        $img->path = $path;
        $img->title = $request->title;
        $img->desc = $request->desc;
        $img->save();

        return redirect()->route('image.index',['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Img  $img
     * @return \Illuminate\Http\Response
     */
    public function destroy(Img $img)
    {
        //
    }
}
