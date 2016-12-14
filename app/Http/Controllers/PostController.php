<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $posts = Post::orderBy('id', 'desc')->paginate(3);
=======
        $posts = Post::orderBy('id', 'desc')->paginate(10);
>>>>>>> refs/remotes/origin/master
        return view('posts.index')->withPosts($posts);
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
        //Validate
        $this->validate($request,array(
                'title' => 'required|max:255',
<<<<<<< HEAD
=======
                'slug' => 'required|alpha-dash|min:5|max:255|unique:posts,slug',
>>>>>>> refs/remotes/origin/master
                'body' => 'required'
            ));
        //Stor in DB
        $post = new Post;
        $post->title = $request->title;
<<<<<<< HEAD
        $post->body = $request->body;
=======
        $post->slug = $request->slug;
        $post->body = $request->body;
        
>>>>>>> refs/remotes/origin/master
        $post->save();
        
        Session::flash('success','The blog post successfully saved!');
        //Redirect
        return redirect()->route('posts.show', $post->id);
        
        
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
        return view('posts.show')->withPost($post);
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
        return view('posts.edit')->withPost($post);
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
<<<<<<< HEAD
        //Validate
        $this->validate($request,array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        //Stor in DB
        $post = Post::find($id);
        $post->title = $request->input('title');
=======
        $post = Post::find($id);
        //Validate
        if($post->slug == $request->input('slug'))
        {
            $this->validate($request,array(
                    'title' => 'required|max:255',
                    'body' => 'required'
                ));
        }
        else{
            $this->validate($request,array(
                    'title' => 'required|max:255',
                    'slug' => 'required|alpha-dash|min:5|max:255|unique:posts,slug',
                    'body' => 'required'
                ));
        }
        //Stor in DB
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
>>>>>>> refs/remotes/origin/master
        $post->body = $request->input('body');
        $post->save();
        
        Session::flash('success','The blog post successfully saved!');
        //Redirect
        return redirect()->route('posts.show', $post->id);
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
        Session::flash('success', 'The post successfully deleted!');
        return redirect()->route('posts.index');
    }
}
