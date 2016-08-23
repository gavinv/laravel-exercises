@extends('layouts.master')

@section('content')
<form method="POST" action="{{ action('PostsController@update', $post->id) }}">
	{{ method_field('PUT') }}
	{!! csrf_field() !!}
	Title: <input type="text" name="title" value="{{ old('title') }}">
	Content: <textarea name="content" rows="5" cols="40">{{ old('content') }}</textarea>
	URL: <input type="text" name="url" value="{{ old('url') }}">
	<input type="submit">
</form>
{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
{!! $errors->first('content', '<span class="help-block">:message</span>') !!}
{!! $errors->first('url', '<span class="help-block">:message</span>') !!}
@stop