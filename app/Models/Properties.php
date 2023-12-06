<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Properties extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'propertyType', 'address', 'unit_no', 'status', 'phase_id', 'block_id'];
    function type()
    {
        $user = PropertyType::find($this->propertyType);
        return $user;
    }
    function block()
    {
        $block = Block::find($this->block_id);
        return $block;
    }
    function phase()
    {
        $phase = Phase::find($this->phase_id);
        return $phase;
    }
}
