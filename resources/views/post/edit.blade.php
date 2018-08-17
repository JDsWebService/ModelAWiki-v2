@extends('layouts.admin')

@section('title', 'Edit Post')

@section('stylesheets')
    
    {{-- Select 2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    {{-- Button Slider --}}
    <link rel="stylesheet" href="/css/slider.css">

@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <a href="{{ route('post.index') }}"><< Go Back</a>
        </div>
    </div>
    
	{{ Form::postForm($categories, $tags, 'update', 'PUT', 'Save Post', $post, $post->id) }}

@endsection

@section('scripts')
	
    {{-- Select 2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multi').select2();
        });
    </script>

    {{-- Tiny MCE --}}
    <script src="/js/tinymce/tinymce.min.js"></script>

    {{-- Image Upload Javascript --}}
    <script src="/js/imageupload.js"></script>

@endsection