<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    protected $fillable = [ 'description','date','vendorId', 'adminId'];
    function vendor(){
        $vendor = Vendor::find($this->vendorId);
        return $vendor;
    }
}
