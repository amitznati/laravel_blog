@extends('layouts.main')

@section('title', "| $tag->name Tag")

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
		</div>
		<div class="col-md-4">
			<br>
			<a href="{{ route('tags.edit', $tag->id ) }}" class="btn btn-primary">Edit</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($tag->posts as $post)
					<tr>
						<th>{{ $post->id}}</th>
						<th>{{ $post->title }}</th>
						<th>
							@foreach($post->tags as $tag)
								<span class="label label-default">{{ $tag->name }}</span>
							@endforeach
						</th>
						<td><a href="{{ route('posts.show', $post->id ) }}" class="btn btn-primary btn-xs">View</a></td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop