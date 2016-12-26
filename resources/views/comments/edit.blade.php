@extends('layouts.main')

@section('title', '| Edit Comment')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
        <h1>Edit Comment</h1>
            {!! Form::model($comment, ['route'=> ['comments.update', $comment->id], 'method' => 'PUT']) !!}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null , ['class' => 'form-control', 'disabled' => '']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null , ['class' => 'form-control', 'disabled' => '']) }}
                </div>

                <div class="col-md-12">
                    {{ Form::label('comment', 'Comment:') }}
                    {{ Form::textarea('comment', $comment->comment, ['class' => 'form-control', 'rows' => '5']) }}
                <br>
                    {{ Form::submit('Update Comment',['class' => 'btn btn-success btn-block']) }}
                </div>  
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection