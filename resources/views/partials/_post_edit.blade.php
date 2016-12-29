{{ Form::label('title','Title:') }}
{{ Form::text('title',null,array('class' => 'form-control', 'required' => '',  'placeholder' => 'Title')) }}
<br>
{{ Form::label('slug', 'Slug:') }}
{{ Form::text('slug', null, array('class'=>'form-control', 'required'=>'','minlength' => '5', 'maxlength' => '255' )) }}
<br>
{{ Form::label('category_id','Category:') }}
{{ Form::select('category_id',$categories, null, ["class" => "form-control"]) }}
<br>
{{ Form::label('tags','Tags:') }}
{{ Form::select('tags[]',$tags, null, ["class" => "form-control select2-multi", 'multiple' => 'multiple']) }}
<br>
<br>
{{ Form::label('featured_image', 'Upload Featured Image') }}
{{ Form::file('featured_image') }}
<br>
{{ Form::label('body','Post Body:') }}
{{ Form::textarea('body',null ,array('class' => 'form-control', 'placeholder' => 'Free Text Here...')) }}