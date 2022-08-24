<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmCategory;
use App\Models\FilmGenre;
use App\Models\FilmCountry;
use App\Models\FilmDetail;
use App\Models\FilmRank;
use App\Models\Evaluated;
use App\Models\EvalueFilm;
use App\Models\FilmSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{

    public function show($id)
    {
        $film = Film::with('filmdetail')->where('id', $id)->first();
        $account_rate_max = DB::table('evaluateds')->select('account_id')->where('film_id', $id)->distinct()->get();

        $a = array();

        foreach ($account_rate_max as $key => $value) {

            foreach ($value as $key => $value2) {
                $maxrate = DB::table('evaluateds')->where('account_id', $value2)->max('star');
                array_push($a, $maxrate);
            }
        }

        $avg = 0;
        if (count($a) > 0) {
            $avg = round(array_sum($a) / count($a), 2);
        }
        return view('page.fimdetail')->with(compact('film', 'avg'));
    }

    public function watch($id)
    {

        $film = Film::with('filmdetail')->where('id', $id)->first();

        $film->viewfilm = $film->viewfilm + 1;
        $film->save();

        $list_film = Film::with('filmdetail')->orderBY('id', 'DESC')->limit(4);



        return view('page.filmwatch')->with(compact('film', 'list_film'));
    }

    public function evalue(Request $request, $id)
    {
        $evalue = new Evaluated();
        $evalue->star = $request->rate;
        $evalue->account_id = Auth()->user()->id;
        $evalue->film_id = $id;
        $save = $evalue->save();

        if ($save) {
            return redirect()->back()->with('success', 'Đánh giá thành công');
        }

        return redirect()->back()->with('errors', 'Đánh giá không thành công');
    }

    public function showuprank()
    {
        return view('page.uprankvip');
    }
}
