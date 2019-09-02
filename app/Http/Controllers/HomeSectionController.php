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
    const HOME_POST = 22;

    public function __construct()
    {
        $this->middleware('admin')->except(['home', 'show']);
    }

    /**
     * Site Home 
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $post = Post::find($this::HOME_POST);
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
        $posts = Post::all();
        return View::make('home_sections.create')->with('homeSection', $homeSection)->with('posts', $posts);
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
        $homeSection->posts()->saveMany(Post::find(Input::get('posts')));
        return Redirect::to('topics/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSection $topic)
    {
        return View::Make('home_sections.show')->with('homeSection', $topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSection $topic)
    {
        $posts = Post::all();
        return View::make('home_sections.edit')->with('homeSection', $topic)->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSection $topic)
    {
        $topic->name = Input::get('name');
        $topic->save();
        $topic->posts()->saveMany(Post::find(Input::get('posts')));
        return Redirect::to('topics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSection $topic)
    {
        $topic->delete();
        return Redirect::to('topics');
    }
}
