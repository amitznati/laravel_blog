@extends('layouts.main')

@section('title', '| Delete Comment')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h1>DELETE THIS COMMENT?</h1>
        <br>
            <div class="comment">    
                <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?d=retro"}}" class="author-img">
                    <div class="author-name">
                        <h4>{{ $comment->name }}</h4>
                        <p>{{ date('F nS, Y - G:i', strtotime($comment->created_at)) }}</p>
                    </div>
                </div>
                <div class="comment-content">
                    {{$comment->comment}}
                </div>
            </div>
            {!! Form::model($comment, ['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection