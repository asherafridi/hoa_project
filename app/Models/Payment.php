<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='payments';

    protected $fillable=['userId','transactionId','paymentDate','amount','paymentMethod','status','reference','screenshot'];

    public function user(){
        return User::find($this->userId);
    }

    public function transaction(){
        return Transaction::find($this->transactionId);
    }
}