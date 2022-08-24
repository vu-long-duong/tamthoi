<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FilmCategory;
use App\Models\FilmGenre;
use App\Models\FilmCountry;
use App\Models\FilmDetail;
use App\Models\FilmRank;
use App\Models\FilmSale;
use App\Models\Film;
use App\Models\FilmYear;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $list_category = FilmCategory::with('filmdetail.films')->orderBy('id', 'DESC')->paginate(4);

        $list_genre = FilmGenre::with('filmdetail')->orderBy('id', 'DESC')->get();

        $list_countrie = FilmCountry::orderBy('id', 'DESC')->get();
        $list_year = FilmYear::orderBy('id', 'DESC')->get();

        $slide = Film::orderBy('id', 'DESC')->limit(5)->get();

        $slidebar = Film::orderBy('viewfilm', 'DESC')->limit(5)->get();

        return view('page.homefilm')->with(compact('list_category', 'list_genre', 'list_year', 'list_countrie', 'slide', 'slidebar'));
    }

    public function timkiem()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = FilmCategory::orderBy('id', 'ASC')->where('status', 1)->get();
            $genre = FilmGenre::orderBy('id', 'DESC')->get();
            $country = FilmCountry::orderBy('id', 'DESC')->get();

            $findcategory = FilmCategory::where('namecategory', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->paginate(40);
            
            return view('layout.nav-horizontal')->with(compact('category', 'genre', 'country', 'search', 'findcategory'));
        } else {
            return redirect()->back()->with('success', 'keyword not found');
        }
    }

    public function showfilmcategory(Request $request, $id)
    {
        $list_category = FilmCategory::with('filmdetail.films')->where('id', $id)->get();

        $list_genre = FilmGenre::with('filmdetail')->orderBy('id', 'DESC')->get();
        $list_countrie = FilmCountry::orderBy('id', 'DESC')->get();
        $list_year = FilmYear::orderBy('id', 'DESC')->get();
        $slide = Film::orderBy('id', 'DESC')->limit(5)->get();
        $slidebar = Film::orderBy('viewfilm', 'DESC')->limit(5)->get();

        return view('page.filmcategory')->with(compact('list_category', 'list_genre', 'list_year', 'list_countrie', 'slide', 'slidebar'));
    }

    public function showfilmgenre(Request $request, $id)
    {
        $list_genre = FilmGenre::with('filmdetail')->where('id', $id)->get();

        $list_category = FilmCategory::with('filmdetail.films')->orderBy('id', 'DESC')->get();
        $list_countrie = FilmCountry::orderBy('id', 'DESC')->get();
        $list_year = FilmYear::orderBy('id', 'DESC')->get();
        $slide = Film::orderBy('id', 'DESC')->limit(5)->get();
        $slidebar = Film::orderBy('viewfilm', 'DESC')->limit(5)->get();

        return view('page.filmgenre')->with(compact('list_category', 'list_genre', 'list_year', 'list_countrie', 'slide', 'slidebar'));
    }

    public function showfilmcountrie(Request $request, $id)
    {

        $list_countrie = FilmCountry::with('filmdetail.films')->where('id', $id)->get();

        $list_genre = FilmGenre::with('filmdetail')->orderBy('id', 'DESC')->get();

        $list_category = FilmCategory::orderBy('id', 'DESC')->get();
        $list_year = FilmYear::orderBy('id', 'DESC')->get();
        $slide = Film::orderBy('id', 'DESC')->limit(5)->get();
        $slidebar = Film::orderBy('viewfilm', 'DESC')->limit(5)->get();

        return view('page.filmcountrie')->with(compact('list_category', 'list_genre', 'list_year', 'list_countrie', 'slide', 'slidebar'));
    }

    public function showfilmyear(Request $request, $id)
    {

        $list_year = FilmYear::with('filmdetail.films')->where('id', $id)->get();

        $list_countrie = FilmCountry::orderBy('id', 'DESC')->get();

        $list_genre = FilmGenre::with('filmdetail')->orderBy('id', 'DESC')->get();

        $list_category = FilmCategory::orderBy('id', 'DESC')->get();

        $slide = Film::orderBy('id', 'DESC')->limit(5)->get();
        $slidebar = Film::orderBy('viewfilm', 'DESC')->limit(5)->get();

        return view('page.filmyear')->with(compact('list_category', 'list_genre', 'list_year', 'list_countrie', 'slide', 'slidebar'));
    }
}
