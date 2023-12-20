<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollVotes extends Model
{
    use HasFactory;
    protected $table = 'polls_votes';

    protected $fillable = [
        'user_id',
        'option_id',
        'poll_id'
    ];
}
