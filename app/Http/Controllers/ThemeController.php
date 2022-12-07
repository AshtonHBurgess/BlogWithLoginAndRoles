<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThemeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.theme.manager');
//    $this->middleware('check.user.active')->only('welcome');
        //want this middleware to run for every crud exept for one
        //-

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $themes=Theme::with(['createdBy','updatedBy'])->get();

        return view('themes.index',compact('themes'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('themes.create');
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
        $request->validate(
            [
                'name'=>['required','unique:themes,name','max:50'],
                'cdn_url'=>['required','unique:themes,cdn_url','url','max:255'],
            ]
        );

        Theme::create([
            'name' => $request->name,
            'cdn_url'=> $request->cdn_url,
            'created_by'=>auth()->id(),


        ]);
        return redirect(route('themes.index'))->with('status', 'has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
        return view('themes.show',compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        //

        return view('themes.edit',compact(['theme']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        //
        $request->validate(
            [
                'name'=>'required|unique:themes,name,'.$theme->id.' |max:50',
                'cdn_url'=>'required','unique:themes,cdn_url','url,'.$theme->id.'|max:255',
            ]
        );

        $theme->name= $request->name;
        $theme->cdn_url= $request->cdn_url;
        $theme->updated_by = auth()->id();
        $theme->save();


        return redirect(route('themes.index'))->with('status', 'has been edited!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        if($theme->id != 1){
            $theme->delete();
            return redirect(route('themes.index'))->with('status', 'Theme has been deleted!');
        }
        else
            return redirect(route('themes.index'))->with('status', 'YOU CANNOT DELETE THE DEFAULT THEME');
        //


    }
}
