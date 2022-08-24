<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccount;
use App\Mail\VerifyEmail;
use App\Models\Account;
use App\Models\VerifyAccount;
use App\Models\Userprofile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SignupController extends Controller
{
    const ROLE_USER = 1;
    const PRICE_DEFAULT = 30000;
    public function getsignup()
    {
        return view('Auth.signup');
    }

    public function signup(StoreAccount $request)
    {


        $user = new Account($request->only(['username', 'email', 'password']));
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = self::ROLE_USER;
        $user->password2 = null;
        $save = $user->save();
        if ($save) {

            $userprofile = new Userprofile();
            $userprofile->id = $user->id;
            $userprofile->account_id = $user->id;
            $userprofile->name = $user->username;
            $userprofile->price = self::PRICE_DEFAULT;
            $userprofile->save();

            $token = Str::random(60);

            VerifyAccount::create([
                'token' => $token,
                'account_id' => $user->id,
            ]);



            Mail::to($request->email)->send(new VerifyEmail($request->username, $token));

            return back()->with('success', 'New User has been successfuly added to database');
        }

        return back()->with('fail', 'Something went wrong, try again later');
    }
}
