<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Committee;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable = ['eventName', 'description', 'startDate','endDate','location','committeeId'];  

    function committee(){
        $committee = Committee::find($this->committeeId);
        return $committee;
    }
}
