<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'phone',
        'lot_number',
        'userType',
        'propertyId',
        'balance',
        'status',
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
        'password' => 'hashed',
    ];
    function type()
    {
        $user = UserType::withTrashed()->find($this->userType);
        return $user;
    }
    function property()
    {
        $user = Properties::withTrashed()->find($this->propertyId);
        return $user;
    }

    function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
    function phase()
    {

        $property = Properties::withTrashed()->find($this->propertyId);
        return $property->phase_id != null ? $property->phase()->name : 'Phase Not Found';
    }
    function block()
    {

        $property = Properties::withTrashed()->find($this->propertyId);
        return $property->block_id != null ? $property->block()->name : 'Block Not Found';
    }
}
