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
                    <h5>Category: {{ $post->category->name }}</h5>
                    <p>{{ substr(strip_tags($post->body),0,300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                    @if($post->image_url)
                    <img src="{{asset('images/' . $post->image_url)}}" height="100" width="100">
                    <br>
                    @endif
                    <a href="{{ route('blog.single', $post->slug) }}">Read More</a>
                    <br>
                    <h5>Published By:</h5>
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($post->user->email))) . "?d=wavatar"}}" class="author-img">
                        <div class="author-name">
                            <h4>{{ $post->user->name }}</h4>
                            <p>{{ date('F dS, Y - G:i', strtotime($post->created_at)) }}</p>
                        </div>
                    </div>
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
