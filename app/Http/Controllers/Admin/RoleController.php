<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 0;
    public function getRole()
    {

        return view('admin.create-role-account.blade.php');
    }

    public function show()
    {
        $list_role = Account::orderBy('id', 'DESC')->get();
        

        return view('admin.show-role-account')->with(compact('list_role'));
    }

    public function showpermissionuser(Request $request, $id)
    {
        $user = Account::find($id);
        return view('admin.permisson-user')->with(compact('user'));
    }

    public function grantpermissionuser(Request $request, $id)
    {
        $user = Account::find($id);
        $user->role = $request->role;
        $save = $user->save();
        if ($save) {
            return redirect()->back()->with('success', 'Update permisson user has been successfuly added to database');
        }
        return redirect()->back()->with('fail', 'Something went wrong, try again later');
    }
}
