<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrder extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['propertyId','requestedBy','requested_date','description','priority','status','assignedTo','completion_date','invoice','invoice_amount'];
    function vendor(){
        $vendor = Vendor::find($this->assignedTo);
        return $vendor;
    }

    function requestedBy(){
        $user = User::find($this->requestedBy);
        return $user;
    }

    function property(){
        $property=Properties::find($this->propertyId);
        return $property;
    }
}
