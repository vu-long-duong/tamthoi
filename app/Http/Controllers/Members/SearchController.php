<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmCategory;
use App\Models\FilmGenre;
use App\Models\FilmCountry;
use App\Models\FilmDetail;
use App\Models\FilmRank;
use App\Models\FilmSale;
use App\Models\Film;

class SearchController extends Controller
{
    public function search()
    {
        if ($_GET['search'] == '%' || $_GET['search'] == ' ') {
            return back()->with('errors', 'Kí tự nhập không hợp lệ, Xin mời nhập lại');
        }

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $filmsearch = Film::where('name', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->paginate(40);
            return view('page.search', compact('search', 'filmsearch'));
        }
    }

    public function searchdetail(Request $request)
    {
        $data = $request->only('genre_', 'category', 'countrie', 'year');

        [
            'genre_' => $genre,
            'category' => $category,
            'countrie' => $countrie,
            'year' => $year
        ] = $data;

        $film = FilmDetail::with('films');

        if ($genre) {
            $film = $film->where('genre_id', $genre);
        }

        if ($category) {
            $film = $film->where('category_id', $category);
        }

        if ($countrie) {
            $film = $film->where('countrie_id', $countrie);
        }

        if ($year) {
            $film = $film->where('year_id', $year);
        }

        $film = $film->get();

        return view('page.searchdetail')->with(compact('film'));
    }
}
