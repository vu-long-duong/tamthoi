<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\FilmCategory;
use App\Models\FilmGenre;
use App\Models\FilmCountry;
use App\Models\FilmDetail;
use App\Models\FilmRank;
use App\Models\FilmSale;
use App\Http\Requests\StoreFilm;
use App\Http\Controllers\UpdateImgageTrait;
use App\Http\Controllers\UpdateSubtitleTrait;
use App\Http\Controllers\UpdateVideoTrait;
use App\Models\FilmYear;
use File;
use Illuminate\Support\Facades\Log;
use Throwable;

class FilmADController extends Controller
{

    use UpdateImgageTrait;
    use UpdateVideoTrait;
    use UpdateSubtitleTrait;

    public function showfilm()
    {
        $list_film = Film::with('filmdetail')->orderBy('id', 'DESC')->get();

        $path = public_path() . '/json/';

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        File::put($path . 'movies.json', json_encode($list_film));

        return view('admin.show-film-detail')->with(compact('list_film'));
    }

    public function getfilm()
    {
        $filmdetail = FilmDetail::with('filmcategory')->orderBy('id', 'DESC')->get();
        $category = FilmCategory::orderBy('id', 'DESC')->get();
        $genre = FilmGenre::orderBy('id', 'DESC')->get();
        $year = FilmYear::orderBy('id', 'DESC')->get();
        $countrie = FilmCountry::orderBy('id', 'DESC')->get();
        $rank = FilmRank::orderBy('id', 'DESC')->get();
        return view('admin.create-film-detail')->with(compact('category', 'genre', 'filmdetail', 'countrie', 'rank', 'year'));
    }

    public function storefilm(Request $request)
    {
        $category = FilmCategory::get();
        $genre = FilmGenre::get();
        $countrie = FilmCountry::get();
        $rank = FilmRank::get();
        $year = FilmYear::get();

        try {
            log::channel('post_history')->info('Thử log');
            $film = new Film();
            $film->name = $request->name;
            $film->episodenumber = $request->episodenumber;
            $film->status = $request->status;

            if ($request->hasFile('subtitle')) {
                $subtitle = $request->subtitle;
                $subtitle = $this->uploadsubtitle($subtitle, 'subtitle', 'subtitles');
                $film->subtitle = $subtitle;
            }

            if ($request->hasFile('image')) {
                $image = $request->image;
                $image = $this->uploadimage($image, 'image', 'images');
                $film->imagefilm = $image;
            }

            if ($request->hasFile('video')) {
                $video = $request->video;
                $video = $this->uploadvideo($video, 'video', 'videos');
                $film->videofilm = $video;
            }

            $film->save();
        } catch (Throwable $throw) {

            Log::channel('post_history')->error($throw->getMessage());
        }
        $filmdetail = new FilmDetail();
        $filmdetail->summary = $request->summary;
        $filmdetail->tags = $request->tags;

        $filmdetail->year_id = $request->year;
        $filmdetail->category_id = $request->category;
        $filmdetail->genre_id = $request->genre;
        $filmdetail->countrie_id = $request->countrie;
        $filmdetail->rank_id = $request->rank;
        $filmdetail->film_id = $film->id;

        $filmdetail->save();

        return redirect()->route('admin.show-film-detail')->with(compact('category', 'genre', 'countrie', 'rank', 'film', 'year'));
    }



    public function update(Request $request)
    {
        # code...
    }
}
