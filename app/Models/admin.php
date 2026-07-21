<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Override;

class admin extends Authenticatable
{
    protected $fillable =
    [
        'img' ,
        'name' ,
        'email',
        'password',
        'phone' ,
        'role' ,
        'address'
    ];

    protected $hidden =
    [
        'password'
    ];


    public function casts(){
        return[
            'password' => 'hashed'
        ];
    }

}