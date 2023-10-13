<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = "gallery";
    protected $fillable = ['name', 'image'];

    public function getImageAttribute($value){
        return '/' . $value; // Assuming images are stored in a folder named 'images'
    }
}
