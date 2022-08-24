<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userprofile;

class ProfileController extends Controller
{
    public function show(){
        $list_user=Userprofile::with('account')->orderBy('id','DESC')->get();
        return view('admin.profile')->with(compact('list_user'));
    }
}
