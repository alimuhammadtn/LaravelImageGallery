@extends('layouts.app')

@section('content')

    <h1>{{$album->name}}</h1>  
    <a class="button secondary" href="/">Back</a> 
    <a href="/photos/create/{{$album->id}}" class="button">Upload Photos To album</a> 

    @if(count($album->photos) > 0)
        <?php
            $colcount = count($album->photos);
            $i=1;
        ?>
        <div id="photos">

        @foreach($album->photos as $photo)
            @if($i == $colcount)
                    <div class="medium-4 columns end">
                        <a href="/photos/{{$photo->id}}">
                            <img class="thumb-nail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"> 
                        </a>
                        <br>
                        <h4>{{$album->name}}</h4>                
                    

            @else
                    <div class="medium-4 columns">
                        <a href="/photos/{{$photo->id}}">
                             <img class="thumb-nail" src="storage/photos/{{$photo->album_id}}/{{$photo->photo}}"> 
                        </a>
                        <br>
                        <h4>{{$photo->title}}</h4>
                    

            @endif

            @if($i % 3 == 0)
                </div>
                </div>
                <div class="row text-center">

            @else
                </div>
            @endif
                <?php $i++ ;?>
        @endforeach
        </div>

    @endif

@endsection