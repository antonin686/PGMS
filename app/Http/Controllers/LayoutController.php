<?php

namespace App\Http\Controllers;

use App\Layout;
use App\Img;
use Illuminate\Http\Request;
use DB;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layoutData = [];
        $layouts = Layout::all();
        
        foreach($layouts as $layout)
        {
            $data = DB::table('layout_images')
            ->join('imgs', 'layout_images.i_id', '=', 'imgs.id')
            ->where('l_id', $layout->id)
            ->get();

            $name = Layout::find($layout->id)->name;
            
            array_push($layoutData,(object) [
                'data' => $data,
                'name' => $name,
                'id' => $layout->id,
            ]);
        }

        // dd($layoutData[0]);
        // return;
       
        return view('layout.index')->with('layouts', $layoutData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Layout $layout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function edit(Layout $layout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $layouts = Layout::all();

        foreach ($layouts as $l) 
        {
            
            if($l->id == $request->layout)
            {
                $l->status = 1;
            }
            else
            {
                $l->status = 0;
            }

            $l->save();
        }
        
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
