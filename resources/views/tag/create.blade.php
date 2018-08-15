@extends('layouts.admin')

@section('title', 'Create Tag')

@section('content')

	{{ Form::tagForm('store', 'POST', 'Create Tag') }}

@endsection