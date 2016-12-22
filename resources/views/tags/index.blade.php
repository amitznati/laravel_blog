@extends('layouts.main')

@section('title', '| Tags')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
				@foreach($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
						<td>
							{!! Form::model($tag , ['route' => ['tags.destroy', $tag->id] ,  'method' => 'DELETE']) !!}
							{!! Form::submit('Delete',["class" => 'btn btn-danger']) !!}
                    		{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
				<h2>New Tag</h2>
				{{ Form::label('name','Name:')}}
				{{ Form::text('name',null,['class' => 'form-control']) }}
				<br>
				{{ Form::submit('Create New Tag',['class' =>'btn btn-primary btn-block']) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop