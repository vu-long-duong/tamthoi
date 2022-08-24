<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function getresetpassword()
    {
        return view('Auth.resetpassword');
    }

    public function resetpassword(Request $request)
    {

        $account = Account::where('email', $request->email)->where('username', $request->username)->first();

        if ($account) {
            return view('Auth.newpassword')->with(compact('account'));
        }

        return redirect()->back()->with('errors', 'Nhập sai');
    }

    public function getnewpassword()
    {
        return view('Auth.newpassword')->with('account');
    }

    public function newpassword(Request $request, $id)
    {
        
        $account = Account::where('id', $id)->first();
        $account->password = bcrypt($request->password);
        $save = $account->save();
        if ($save) {
           
            return redirect()->route('user.login')->with('success', 'Đổi mật khẩu thành công');
        }
       
        return redirect()->back()->with('errors', 'Something went wrong, try again later');
    }

    public function getinputpassword()
    {
        return view('Auth.inputpassword');
    }



    public function resetpasswordold(Request $request)
    {

        if (Hash::check($request->passwordold, auth()->user()->password)) {
            $account = auth()->user()->id;
            return view('Auth.newpassword',['account'=>$account]);
        }

        return redirect()->back()->with('errors', 'Nhập sai');
    }

    public function getinputpassword2()
    {
        return view('Auth.inputpassword2');
    }

    public function createpassword2(Request $request)
    {

        $account = Account::where('id', Auth()->user()->id)->first();

        $account->password2 = bcrypt($request->password2);
        $save = $account->save();

        if ($save) {
            return redirect()->route('user.login')->with('success', 'Đặt mật khẩu cấp 2 thành công');
        }
        return redirect()->back()->with('errors', 'Có lỗi');
    }
}
