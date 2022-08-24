<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGenre;
use App\Models\FilmGenre;

class FilmGenreController extends Controller
{
    public function getfilmgenre()
    {
        return view('admin.create-film-genre');
    }

    public function store(StoreGenre $request)
    {
        $genre = new FilmGenre();
        $genre->namegenre = $request->name;
        $genre->describe = $request->describe;
        $genre->status = $request->status;
        $save = $genre->save();

        if ($save) {
            return redirect()->back()->with('success', 'New Genre has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
    }

    public function show(){
        $list_genre=FilmGenre::orderBy('id','DESC')->get();  
        return view('admin.show-film-genre')->with(compact('list_genre'));
    }

    public function update(){
        return view('admin.update-film-genre');
    }

    public function edit(StoreGenre $request,$id)
    {
        
        $genre=FilmGenre::find($id);
        $genre->namegenre=$request->name;
        $genre->describe=$request->describe;
        $genre->status=$request->status;
        $save = $genre->save();
        if ($save) {
            return redirect()->back()->with('success', 'Update genre has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
        
        
    }
}
