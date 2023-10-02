<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $fillable = ['userId', 'amount', 'date']; 

    function user(){
        $user = User::find($this->userId);
        return $user;
    }
}
