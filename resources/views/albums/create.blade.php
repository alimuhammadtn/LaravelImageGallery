@extends('layouts.app')

@section('content')

    <h3>Create Albums</h3>

    {!!Form::open(['action'=>'albumsController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        {{Form::text('name','',['placeholder'=>'album name'])}}
        {{Form::textarea('description','',['placeholder'=>'album description'])}}
        {{Form::file('cover_image')}}
        {{Form::submit('Submit')}}
    {!!Form::close()!!}

@endsection