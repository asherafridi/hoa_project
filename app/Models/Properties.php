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
    function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'propertyType');
    }
    function phases()
    {
        return $this->belongsTo(Phase::class, 'phase_id');
    }
    function blocks()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }
}
