@extends('layouts.main')

@section('title', '| Edit Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

@endsection

@section('content')
@yield('post_form')
@yield('post_details')

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    @if(isset($post))
    <script type="text/javascript">
        $(".select2-multi").select2();
        $(".select2-multi").select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change'); 
        
    </script>
    @else
        <script type="text/javascript">
        $(".select2-multi").select2(); 
    </script>
    @endif

    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            plugins: ['link code'],
            menubar: false
        });
    </script>
@endsection