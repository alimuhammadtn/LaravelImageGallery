<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;

class albumsController extends Controller
{
    public function index(){

        $albums = Album::with('photos')->get();  

        return view('albums.index')->with('albums',$albums);
    }

    public function create(){

        return view('albums.create');
    }

    public function store(Request $request){

        $this->validate($request,['name'=>'required',
        'cover_image'=>'required|max:1999']);

        $fileNamewithExt = $request->file('cover_image')->getClientOriginalName();

        $filename = pathinfo($fileNamewithExt,PATHINFO_FILENAME);

        $fileExtension = $request->file('cover_image')->getClientOriginalExtension();

        $filenametostore = $filename.'-'.time().$fileExtension;

        $path = $request->file('cover_image')->storeAs('public/album_covers',$filenametostore);
        
        $album = new Album;

        $album->name = $request->input('name');

        $album->description = $request->input('description');

        $album->cover_image = $filenametostore;

        $album->save();

        return redirect('/albums')->with('success','Album created');
        
    }

    public function show($id){
        
        $album = Album::with('photos')->find($id);
        return view('albums.show')->with('album',$album);
    }
}
