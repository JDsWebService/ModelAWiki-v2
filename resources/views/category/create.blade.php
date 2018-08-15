@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')

	{{ Form::categoryForm('store', 'POST', 'Create Category') }}

@endsection