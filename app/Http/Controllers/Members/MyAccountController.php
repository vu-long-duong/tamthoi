<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class MyAccountController extends Controller
{

    public function index(){
        $account=Account::where('id', Auth()->user()->id)->first();
        return view('user.myaccount')->with(compact('account'));
    }
}
