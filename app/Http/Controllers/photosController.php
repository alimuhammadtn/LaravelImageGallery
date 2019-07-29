<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Photos;

class photosController extends Controller
{
    public function create($album_id){

        return view('photos.create')->with('album_id',$album_id);
    }

    public function store(Request $request){

        $this->validate($request,['title'=>'required',
        'photo'=>'required|max:1999']);

        $fileNamewithExt = $request->file('photo')->getClientOriginalName();

        $filename = pathinfo($fileNamewithExt,PATHINFO_FILENAME);

        $fileExtension = $request->file('photo')->getClientOriginalExtension();

        $filenametostore = $filename.'-'.time().$fileExtension;

        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$filenametostore);
        
        $photos = new Photos;

        $photos->title = $request->input('title');

        $photos->description = $request->input('description');

        $photos->album_id = $request->input('album_id');

        $photos->photo = $filenametostore;

        $photos->size = $request->file('photo')->getClientSize();

        $photos->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success','Photos Uploaded');

    }

    public function show($id){

        $photo = Photos::find($id);

        return view('photos.show')->with('photo',$photo);

    }

    public function destroy ($id){

        $photo = Photos::find($id);

        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo));
        {
            $photo->delete();

            return redirect('/')->with('success','Deleted');
        }

    }
}
