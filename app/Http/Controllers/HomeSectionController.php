<?php

namespace App\Http\Controllers;

use App\HomeSection;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class HomeSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['home', 'index']);
    }

    /**
     * Site Home 
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $post = Post::find(1);
        $homeSections = HomeSection::all();

        return View::make('home_sections.home')->with('homeSections', $homeSections)->with('post', $post);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeSections = HomeSection::all();
        return View::make('home_sections.index')->with('homeSections', $homeSections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $homeSection = new HomeSection;
        return View::make('home_sections.create')->with('homeSection', $homeSection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $homeSection = new HomeSection;
        $homeSection->name = Input::get('name');
        $homeSection->save();
        return Redirect::to('homeSections/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSection $homeSection)
    {
        return View::Make('home_sections.show')->with('homeSection', $homeSection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSection $homeSection)
    {
        return View::make('home_sections.edit')->with('homeSection', $homeSection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSection $homeSection)
    {
        $homeSection->name = Input::get('name');
        $homeSection->save();
        return Redirect::to('homeSections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSection $homeSection)
    {
        $homeSection->delete();
        return Redirect::to('homeSections');
    }
}
