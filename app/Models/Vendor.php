<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Vendor extends Authenticatable
{
    use HasFactory, SoftDeletes, HasApiTokens, Notifiable;
    protected $fillable = ['name', 'vendorType', 'contactNumber', 'contactPerson', 'contactEmail', 'password', 'picture', 'status', 'serviceDescription'];

    protected $guard = 'admin';
    function type()
    {
        return VendorType::withTrashed()->find($this->vendorType);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
