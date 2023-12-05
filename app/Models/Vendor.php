<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'vendorType', 'contactNumber', 'contactPerson', 'contactEmail', 'password', 'picture', 'status', 'serviceDescription'];

    function type()
    {
        return VendorType::withTrashed()->find($this->vendorType);
    }
}
