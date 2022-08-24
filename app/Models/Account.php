<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $table = 'accounts';
    protected $fillable = ['username', 'password', 'phonenumber', 'email', 'email_verified_at', 'role','google_id'];

    public function verifyUser()
    {
        return $this->hasOne('App\Models\VerifyUser');
    }

    public function userprofile()
    {
        return $this->hasOne('App\Models\Userprofile');
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function evaluate()
    {
        return $this->hasMany(Evaluated::class);
    }

    function createuserprofile($dataInsert)
    {
        [
     
             'name' =>$name,
             'age' => $age,
             'address' =>$address,
             'price' =>$price,
        ] = $dataInsert;
        $userprofile = new Userprofile();
        $userprofile->account_id = $this->id;
        $userprofile->name = $name;
        $userprofile->age = $age;
        $userprofile->address = $address;
        $userprofile->price = $price;
        $userprofile->save();
        return $this;
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
