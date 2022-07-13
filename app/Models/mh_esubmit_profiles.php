<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_esubmit_profiles extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_esubmit_profiles';

    protected $fillable = [
        'journalID',
        'companyID',
        'firstName',
        'middleName',
        'lastName',
        'prefixType',
        'primaryEmailAddress',
        'passWord',
        'passWordVisible',
        'userType',
        'institution',
        'department',
        'address',
        'postalCode',
        'city',
        'country',
        'contactNumber'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
