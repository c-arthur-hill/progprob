<?php

namespace App\Http\Controllers;

use App\Post;
use App\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['home', 'show', 'index', 'search', 'create', 'store', 'update', 'edit', 'delete']);
        $this->middleware('admin')->except(['home', 'show', 'index', 'search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        return View::make('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        $post = new Post;
        $topics = HomeSection::all();
        return View::make('posts.create')->with('post', $post)->with('posts', $posts)->with('topics', $topics);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->question = Input::get('question');
        $post->answer = Input::get('answer');
        $post->homeSection()->associate(Input::get('topic'));
        $post->save();

        $post->posts()->attach(Input::get('posts'));
        $post->thePosts()->attach(Input::get('parents'));
        return Redirect::to('questions/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return View::Make('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $posts = Post::all();
        $topics = HomeSection::all();
        return View::make('posts.edit')->with('post', $post)->with('posts', $posts)->with('topics', $topics);
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
        $post = Post::find($id);
        $post->question = Input::get('question');
        $post->answer = Input::get('answer');
        $post->homeSection()->associate(Input::get('topic'));
        $post->save();
        $post->posts()->sync(Input::get('posts'));
        $post->thePosts()->sync(Input::get('parents'));
        return Redirect::to('questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return Redirect::to('questions');
    }

    public function search(Request $request)
    {
        $term = Input::get('search');
        $results = Post::search($term)->get();
        return View::make('posts.search')->with('results', $results);
    }
}
