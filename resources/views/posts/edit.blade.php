@extends('layouts.main')

@section('title', '| View Post')

@section('content')

<div class="row">
    {!! Form::model($post, ['route' => ['posts.update', $post->id] , 'method' => 'PUT']) !!}
    <div class="col-md-8">
        {{ Form::label('title' , 'Title:') }}
        {{ Form::text('title', null, ["class" => 'form-control']) }}
        <br>
        {{ Form::label('slug' , 'Slug:') }}
        {{ Form::text('slug',null, ["class" => 'form-control']) }}
        <br>
        {{ Form::label('body' , 'Body:') }}
        {{ Form::textarea('body',null, ["class" => 'form-control']) }}
        
    </div>
    
    <div class="col-md-4">
        <div class="well">
            <div class="dl-horizontal">
                <label>Created At:</label>
                <p>{{ date('M j, Y H:i',strtotime($post->created_at)) }}</p>
            </div>
                
            <div class="dl-horizontal">
                <label>Last Update:</label>
                <p>{{ date('M j, Y H:i',strtotime($post->updated_at)) }}</p>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {{ Form::submit('Save Changes',["class" => 'btn btn-success btn-block']) }}
                    
                </div>
                <div class="col-sm-6">
                    
                    {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
            </div>
        </div>
    </div>    
    <hr>
    
    {!! Form::close() !!}
</div>

@endsection