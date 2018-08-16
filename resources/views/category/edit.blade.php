@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')

	{{ Form::categoryForm('update', 'PUT', 'Save Category', $category, $category->id) }}

@endsection