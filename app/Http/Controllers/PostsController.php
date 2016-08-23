<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Subreddit;
use Log;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['posts'] = Post::with('author')->with('subreddit')->paginate(3);
        $data['loggedInUser'] = Auth::user();
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);

        $post = new Post();
        $post->created_by = Auth::user()->id;
        Log::info($request->all());
        return $this->validateAndSave($post, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['post'] = Post::find($id);
        if(!$data['post']) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post'] = Post::find($id);
        if(!$data['post']) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        return view('posts.edit', $data);
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
        if(!$post) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        return $this->validateAndSave($post, $request);
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
        if(!$post) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        $post->delete();
        $request->session()->flash('SUCCESS_MESSAGE', 'Post successfully deleted!');
        return redirect()->action("PostsController@index");
    }

    private function validateAndSave(Post $post, Request $request)
    {
        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved successfully');

        $this->validate($request, Post::$rules);

        $request->session()->forget('ERROR_MESSAGE');

        $post->sub_id = Subreddit::findByName($request->input('sub_id'))->id;
        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->created_by = Auth::id();
        $post->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'Post was saved successfully');
        return redirect()->action('PostsController@index');
    }
}
