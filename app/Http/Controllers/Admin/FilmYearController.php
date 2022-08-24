<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreYear;
use App\Models\FilmYear;
use Illuminate\Http\Request;


class FilmYearController extends Controller
{
    //
    public function getfilmyear()
    {
        return view('admin.create-film-year');
    }

    public function store(StoreYear $request)
    {
        $film = new FilmYear();
        $film->year = $request->year;
        $film->status = $request->status;
        $save = $film->save();

        if ($save) {
            return redirect()->back()->with('success', 'New year film has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
    }

    public function show()
    {
        $list_film = FilmYear::orderBy('id', 'DESC')->get();
        return view('admin.show-film-year')->with(compact('list_film'));
    }

    public function update()
    {
        return view('admin.update-film-year');
    }

    public function edit(StoreYear $request, $id)
    {

        $film = FilmYear::find($id);
        $film->year = $request->year;
        $film->status = $request->status;
        $save = $film->save();
        if ($save) {
            return redirect()->back()->with('success', 'Update year film has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
    }
}
