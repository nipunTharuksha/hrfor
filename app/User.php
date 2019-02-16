<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**

     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nameinfull','companyid','companyemail','datejoinedtocompany','designation','mainplant',
        'subplant', 'email', 'mobilenumber','address','birthdate','idnumber','gender','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
