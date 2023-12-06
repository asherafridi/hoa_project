<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $table = 'block';

    protected $fillable = [
        'name',
        'phase_id',
    ];
    function type()
    {
        $user = Phase::find($this->phase_id);
        return $user;
    }

}
