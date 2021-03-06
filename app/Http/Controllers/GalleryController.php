<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Img;
use App\Catagory;
use App\Subcatagory;
use App\Layout;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

        return view('gallery.create')->with('imgs', $imgs)->with('layouts', $layouts);
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
            $layout = $request->layout;

            Gallery::where('u_id', $user)->delete();
            
            foreach($request->images as $image)
            {
                $gallery = new Gallery();
                $gallery->u_id = $user;
                $gallery->i_id = $image;
                $gallery->save();
            }

            return redirect()->route('gallery.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
