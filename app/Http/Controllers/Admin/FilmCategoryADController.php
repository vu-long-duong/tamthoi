<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\FilmCategory;
use App\Models\FilmDetail;
use App\Models\Film;
use App\Http\Requests\StoreCategory;

class FilmCategoryADController extends Controller
{
    
    public function getfilmcategory()
    {
        return view('admin.create-film-category');
    }

    public function store(StoreCategory $request)
    {
        $category = new FilmCategory();
        $category->namecategory = $request->name;
        $category->describe = $request->describe;
        $category->status = $request->status;
        $save = $category->save();

        if ($save) {
            return redirect()->back()->with('success', 'New Category has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
    }

    public function show(){
        $list_category=FilmCategory::orderBy('id','DESC')->get();  
        return view('admin.show-film-category')->with(compact('list_category'));
    }

    public function update(){
        return view('admin.update-film-category');
    }

    public function edit(StoreCategory $request,$id)
    {
        
        $category=FilmCategory::find($id);
        $category->namecategory=$request->name;
        $category->describe=$request->describe;
        $category->status=$request->status;
        $save = $category->save();
        if ($save) {
            return redirect()->back()->with('success', 'Update Category has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
        
        
    }


}
