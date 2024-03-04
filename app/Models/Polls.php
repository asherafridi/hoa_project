<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    use HasFactory;
    protected $table = 'polls';

    protected $fillable = [
        'question',
        'result'
    ];

    function options()
    {
        $options = PollOptions::where('poll_id', $this->id)->get();
        return $options;
    }
    function count()
    {
        return PollVotes::where('poll_id', $this->id)->count();
    }
    function isAwnsered($user_id)
    {
        $count = PollVotes::where('user_id', $user_id)->where('poll_id', $this->id)->count();
        if ($count > 0) {
            return true;
        }
        return false;
    }
}
