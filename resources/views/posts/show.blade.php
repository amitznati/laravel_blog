@extends('layouts.main')

@section('title', '| View Post')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="post">
            <h1>{{ $post->title }}</h3>
            <p class="lead">{{ $post->body }}</p>

            <hr>
            
            <div class="tags"> 
                @foreach($post->tags as $tag)
                
                    <span class="label label-default">{{ $tag->name }}</span>
                
                @endforeach
            </div>
        </div>        
    </div>
    
    <div class="col-md-4">
        <div class="well">
            <div>
                <lable class="lead">Url:</lable>
                <p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
            </div>

            <div>
                <lable class="lead">Category:</lable>
                <p>{{ $post->category->name }}</p>
            </div>

            <div>
                <lable class="lead">Created At:</lable>
                <p>{{ date('M j, Y H:i',strtotime($post->created_at)) }}</p>
            </div>
                
            <div>
                <lable class="lead">Last Update:</lable>
                <p>{{ date('M j, Y H:i',strtotime($post->updated_at)) }}</p>
            </div>

            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    
                    {!! Form::model($post, ['route' => ['posts.destroy', $post->id] , 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete',["class" => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
                    
                   <!-- {!! Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}-->
                </div>
                <div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>
            </div>
        </div>
    </div>    
    <hr>
</div>

@endsection