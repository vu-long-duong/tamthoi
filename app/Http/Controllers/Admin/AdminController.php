<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Film;
use App\Models\FilmCategory;
use App\Models\FilmGenre;
use App\Models\Userprofile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = date("Y/m/d");

        $yesterday = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::yesterday());

        $film = DB::table('films')->select(DB::raw('SUM(viewfilm) as total_view'))->get();

        $price = DB::table('userprofiles')->select(DB::raw('SUM(price) as total_price'))
            ->get();

        $newaccoutToday = DB::table('accounts')->select(DB::raw('count(*) as total_account'))
            ->whereYear('created_at', $today)
            ->whereDate('created_at', $today)
            //->whereMonth('created_at', $today)
            ->get();

        $newaccoutYesterday = DB::table('accounts')->select(DB::raw('count(*) as total_account'))
            ->whereYear('created_at', $yesterday)
            ->whereDate('created_at', $yesterday)
            //->whereMonth('created_at', $today)
            ->get();

        foreach ($newaccoutToday as $key => $today) {
            $today = $today->total_account;
        }

        foreach ($newaccoutYesterday as $key => $yesterday) {
            $yesterday = $yesterday->total_account;
        }

        if($yesterday==0)
        $yesterday=1;
        $newaccount = $today * 100.0 /  $yesterday;


        return view('admin.dashboard')->with(compact('film', 'price', 'newaccoutToday','newaccount'));
    }
}
