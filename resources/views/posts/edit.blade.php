@extends('layouts.edit_post')

@section('title', '| Edit Post')


<div class="row">
    @section('post_form')
        {!! Form::model($post, ['route' => ['posts.update', $post->id] , 'method' => 'PUT']) !!}
        
        <div class="col-md-8">

            @include('partials._post_edit')
        
        </div>
        

    @stop
    @section('post_details')
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
    @endsection 
    {!! Form::close() !!}
</div>
