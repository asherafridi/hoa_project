<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Properties extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','propertyType', 'address', 'unit_no','status'];
    function type(){
        $user = PropertyType::find($this->propertyType);
        return $user;
    }
}
