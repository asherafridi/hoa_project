<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'payments';

    protected $fillable = ['userId', 'vendorId', 'transactionId', 'paymentDate', 'amount', 'paymentMethod', 'status', 'reference', 'screenshot', 'admin_reciept'];

    public function user()
    {
        return User::find($this->userId);
    }
    function vendor()
    {
        $user = Vendor::find($this->vendorId);
        return $user;
    }

    public function transaction()
    {
        return Transaction::find($this->transactionId);
    }
    public function getScreenshotAttribute($value)
    {
        if ($value != null) {
            return "/" . $value;
        } else {
            return $value;
        }
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transactionId');
    }
}
