<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmCountry;

use App\Models\FilmDetail;
use App\Models\Film;
use App\Http\Requests\StoreCountries;

class FilmCountriesController extends Controller
{
    public function getfilmcountrie()
    {
        return view('admin.create-film-countrie');
    }

    public function store(StoreCountries $request)
    {
        $countries = new FilmCountry();
        $countries->namecountrie = $request->name;
        $countries->describe = $request->describe;
        $countries->status = $request->status;
        $save = $countries->save();

        if ($save) {
            return redirect()->back()->with('success', 'New Countrie has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
    }

    public function show(){
        $list_countrie=FilmCountry::orderBy('id','DESC')->get();
        
        return view('admin.show-film-countrie')->with(compact('list_countrie'));
    }

    public function update(){
        return view('admin.update-film-countrie');
    }

    public function edit(StoreCountries $request,$id)
    {
        $countries=FilmCountry::find($id);
        $countries->namecountrie=$request->name;
        $countries->describe=$request->describe;
        $countries->status=$request->status;
        $save = $countries->save();
        if ($save) {
            return redirect()->back()->with('success', 'Edit Countrie has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
    }
}
