<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Userprofile;
use App\Models\Account;
use App\Models\Payment;
use App\Models\FilmDetail;
use App\Models\FilmSale;
use App\Http\Requests\StoreUserprofile;
use App\Http\Controllers\UpdateImgageTrait;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    use UpdateImgageTrait;

    public function index($id)
    {
        $user = Userprofile::with('account')->find($id);
        return view('user.userprofile')->with(compact('user'));
    }


    public function edit($id)
    {
        
    }


    public function update(StoreUserprofile $request, $id)
    {

        $userprofile = Userprofile::with('account')->where('id', $id)->first();

        $user = Account::with('userprofile')->where('id', $userprofile->id)->first();
        
        $userprofile->name = $request->name;
        $userprofile->age = $request->age;
        $userprofile->address = $request->address;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image = $this->uploadimage($image, 'image', 'images');
            $userprofile->images=$image;
        }

        $userprofile->save();
        $user->save();
        return  back()->with('sussess', 'Cập nhật thông tin cá nhân thành công');
    }


    public function getaddprice($id)
    {
        $price = Userprofile::find($id);
        return view('user.addprice')->with(compact('price'));
    }

    public function getbank($id)
    {
        $user = Userprofile::with('account')->find($id);
        $bank = Payment::find($id);
        return view('user.bank')->with(compact('bank', 'user'));
    }


    public function storebank(Request $request, $id)
    {
        ///todo request
        $bank = Payment::where('userprofile_id', $id)->get();
        $user = Userprofile::with('account')->find($id);
        ///to do nếu như đã có rồi thì ko thêm nữa
        $bank = new Payment();
        $bank->bank = $request->bank;
        $bank->cardnumber = $request->cardnumber;
        $bank->userprofile_id = $id;
        $save = $bank->save();
        if ($save) {
            return  redirect()->route('user.index',['id'=>$user->id])->with('success', 'New Bank has been successfuly added to database');
        }
        return back()->with('fail', 'Something went wrong, try again later');
    }

    public function updatebank($id)
    {
        $user = Userprofile::with('account')->find($id);
        $bank = Payment::where('userprofile_id',$id)->first();
        
        return view('user.updatebank')->with(compact('bank', 'user'));
    }

    public function editbank(Request $request, $id)
    {

        $bank = Payment::where('userprofile_id',$id)->get();

        $bank->bank = $request->bank;
        $bank->cardnumber = $request->cardnumber;

        $save = $bank->save();
        ///to do: không hiểu kiểu gì mà báo lỗi hàm save() :))))

        if ($save) {
            return back()->with('success', 'Update Bank has been successfuly added to database');
        }
        return back()->with('fail', 'Something went wrong, try again later');
    }



    public function MoneyIntoYourAccount(Request $request, $id)
    {

        $validate = $request->validate(
            [
                'price' => 'required',
            ],

            [
                'price.required' => 'Tiền chưa điền kìa',
            ]
        );
        $price = Userprofile::find($id);

        $price->price = $validate['price'] + $price->price;

        $save = $price->save();

        if ($save) {
            return redirect()->route('user.index', ['id' => $price->id])->with('success', 'Cập nhật số tiền thành công');
        }
        return redirect()->back()->with('fail', 'Cập nhật không thành công');
    }


    public function payment($id)
    {

    }


}
