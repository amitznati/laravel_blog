@extends('layouts.main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag" )

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <div class="tags"> 
                @foreach($post->tags as $tag)
                
                    <span class="label label-default">{{ $tag->name }}</span>
                
                @endforeach
            </div>
            <p>Posted In: {{ $post->category ? $post->category->name : "" }}</p>
            <br>
            <h4>Comments:</h4>
            @foreach($post->comments as $comment)

                <p><strong>Name: </strong>{{ $comment->name }}</p>
                <p><strong>Comment:</strong><br>{{$comment->comment}}</p>
            @endforeach
        </div>
    </div>
    <br>
    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            {{ Form::open(['route'=> ['comments.store', $post->id], 'method' => 'POST']) }}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-12">
                    {{ Form::label('comment', 'Comment:') }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                <br>
                    {{ Form::submit('Add Comment',['class' => 'btn btn-success btn-block']) }}
                </div>  
            </div>
        </div>
    </div>

    
@stop