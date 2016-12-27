@extends('layouts.main')
    
    @section('title','| Blogs')
    
    @section('content')
        <div class="row">
        	<div class="col-md-12 col-md-offset-2">
        		<h1>Blog</h1>
        	</div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($posts as $post)
                <div class="post">
                    <h2>{{ $post->title }}</h2>
                    <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
                    <p>{{ substr(strip_tags($post->body),0,300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                    <a href="{{ route('blog.single', $post->slug) }}">Read More</a>
                </div>
                
                <hr>
                @endforeach
                
                
                
            </div>
            <div class="col-md-2">
                <h2>Sidebar</h2>
            </div>
        </div>
        
        <div class="text-center">
            {!! $posts->links(); !!}
        </div>
    @endsection
