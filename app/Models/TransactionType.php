<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionType extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'transaction_type';
    
    protected $fillable = ['name']; 
    function type(){
        $type = TransactionType::find($this->transactionType);
        return $type;
    }
}
