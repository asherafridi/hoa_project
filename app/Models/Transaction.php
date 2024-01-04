<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transaction';
    protected $fillable = ['userId', 'vendorId', 'transactionType', 'transactionDate', 'amount', 'status', 'description'];
    function user()
    {
        $user = User::find($this->userId);
        return $user;
    }
    function vendor()
    {
        $user = Vendor::find($this->vendorId);
        return $user;
    }
    function type()
    {
        $user = TransactionType::find($this->transactionType);
        return $user;
    }

    function payment()
    {
        $payment = Payment::where('status', '!=', 'Declined')->where('transactionId', $this->id)->first();
        return $payment;
    }
}
