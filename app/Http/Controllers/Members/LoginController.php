<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckAccount;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccount;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\VerifyAccount;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Userprofile;



class LoginController extends Controller
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 0;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        return view('Auth.login');
    }

    public function loginaccount(CheckAccount $request)
    {

        $nameuser = $request->username;
        $user = Account::where('username', $nameuser)->first();

        if (Auth::attempt($request->only('username', 'password'))) {

            if ($user->password2 != null) {
                return redirect()->route('user.show-checkpassword2');
            }

            if ($user->role == self::ROLE_USER) {
                return redirect()->route('user.home');
            }

            if ($user->role == self::ROLE_ADMIN) {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
            }
        }

        return back()->with('errors', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function getcheckpass2()
    {
        return view('Auth.checkpassword2');
    }

    public function checkpass2(Request $request)
    {
        if (Hash::check($request->password2, auth()->user()->password)) {
            $id=Auth()->user()->id;
            $user = Account::where('id', $id)->first();
            if ($user->role == self::ROLE_USER) {
                return redirect()->route('user.home');
            }

            if ($user->role == self::ROLE_ADMIN) {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
            }
        }

        return back()->with('errors', 'Nhập sai pass cấp 2');
    }





    public function logingoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackgoogle()
    {
        try {
            $user = Socialite::driver('google')->user();

            $is_user = Account::where('email', $user->getEmail())->first();

            if (!$is_user) {

                $saveUser = Account::updateOrCreate([
                    'google_id' => $user->getId(),
                ], [
                    'username' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => '',
                    'role' => self::ROLE_USER
                ]);

                $userprofile = new Userprofile();
                $userprofile->account_id = $saveUser->id;
                $userprofile->name = $user->getName();
                $userprofile->price = 30000;
                $userprofile->save();
            } else {
                $saveUser = Account::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = Account::where('email', $user->getEmail())->first();
            }

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('user.home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function loginfacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackfacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $saveUser = Account::updateOrCreate([
                'facebook_id' => $user->getId(),
            ], [
                'username' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => '',
                'role' => self::ROLE_USER
            ]);

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('user.home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Auth.signup');
    }
}
