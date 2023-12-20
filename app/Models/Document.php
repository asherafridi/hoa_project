<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'file', 'forUser', 'adminId'];

    public function getFileAttribute($value)
    {
        if ($value != null) {
            return "/" . $value;
        } else {
            return $value;
        }
    }
}
