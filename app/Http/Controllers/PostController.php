<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct (){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::where('user_id',Auth::id())->orderBy('id', 'desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('is_active', '=', '1')->get()->lists('name','id');
        $tags = Tag::all()->lists('name','id');
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //Validate
        $this->validate($request,array(
                'title'          => 'required|max:255',
                'slug'           => 'required|alpha-dash|min:5|max:255|unique:posts,slug',
                'category_id'    => 'required|integer',
                'body'           => 'required',
                'featured_image' => 'sometimes|mimes:jpeg,bmp,png,jpg'
            ));
        $post = new Post;

        //Stor in DB
        $post->title       = $request->title;
        $post->slug        = $request->slug;
        $post->category_id = $request->category_id;
        $post->body        = Purifier::clean($request->body);
        $post->user_id     = Auth::id();
        
        //save our image
        if($request->hasFile('featured_image'))
        {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image_url = $filename;
        }

        $post->save();
        
        $post->tags()->sync($request->tags, false);

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
        $categories = Category::where('is_active', '=' ,'1')->lists('name','id');
        $tags = Tag::all()->lists('name','id');
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
        //dd($request);
        $post = Post::find($id);
        //Validate
        $this->validate($request,array(
                'title'          => 'required|max:255',
                'slug'           => "required|alpha-dash|min:5|max:255|unique:posts,slug,$id",
                'category_id'    => 'required|integer',
                'body'           => 'required',
                'featured_image' => 'sometimes|mimes:jpeg,bmp,png,jpg'
            ));
        //Stor in DB
        $post->title       = $request->input('title');
        $post->slug        = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body        = Purifier::clean($request->body);
        //save our image
        if($request->hasFile('featured_image'))
        {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $post->image_url;
            $post->image_url = $filename;

            Storage::delete($oldFilename);
        }

        $post->save();
        
        $post->tags()->sync($request->tags ? $request->tags : [] ); 

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
        $post->tags()->detach();
        Storage::delete($post->image_url);
        $post->delete();
        Session::flash('success', 'The post successfully deleted!');
        return redirect()->route('posts.index');
    }
}
