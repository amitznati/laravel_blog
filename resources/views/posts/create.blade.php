
@extends('layouts.edit_post')

@section('title','| Create New Post')

@section('post_form')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Cteate New Post</h1>
            <hr>
            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
                @include('partials._post_edit')
                {{ Form::submit('Create Post',array('class' => 'btn btn-success btn-lg btn-block' , 'style' => 'margin-top: 20px') )}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection