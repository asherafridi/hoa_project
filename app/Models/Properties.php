<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'address', 'userId'];
    function user(){
        $user = User::find($this->userId);
        return $user;
    }
}
