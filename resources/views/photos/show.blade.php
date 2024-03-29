@extends('layouts.app')

@section('content')

    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <a href="/albums/{{$photo->album_id}}" class="button primary">Back to Gallery</a> <br>
    <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"> 
    {!! Form::open(['action'=> ['photosController@destroy',$photo->id], 'method'=> 'POST' ])!!}

        {{Form::hidden('_method','DELETE')}}

        {{Form::submit('Delete Photo',['class'=>'button alert'])}}

    {!!Form::close()!!}

@endsection