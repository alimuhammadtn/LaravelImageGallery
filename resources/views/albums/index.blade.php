@extends('layouts.app')

@section('content')

    <h3>Photo Gallery</h3>

    @if(count($albums) > 0)
        <?php
            $colcount = count($albums);
            $i=1;
        ?>
        <div id="albums">

        @foreach($albums as $album)
            @if($i == $colcount)
                    <div class="medium-4 columns end">
                        <a href="/albums/{{$album->id}}">
                            <img class="thumb-nail" src="storage/album_covers/{{$album->cover_image}}"> 
                        </a>
                        <br>
                        <h4>{{$album->name}}</h4>                
                    

            @else
                    <div class="medium-4 columns">
                        <a href="/albums/{{$album->id}}">
                             <img class="thumb-nail" src="storage/album_covers/{{$album->cover_image}}">
                        </a>
                        <br>
                        <h4>{{$album->name}}</h4>
                    

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
    
    @else
        <p>No albums to display</p>
    @endif

@endsection