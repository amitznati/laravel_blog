@extends('layouts.main')

@section('title', '| Edit Tag')

@section('content')

	{{ Form::model($tag, ['route' => ['tags.update',$tag->id], 'method' => 'PUT']) }}

	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name', $tag->name, ['class' => 'form-control']) }}
	<br>
	{{ Form::submit('Save Changes',['class' => 'btn btn-success']) }}
	{{ Form::close() }}

@stop