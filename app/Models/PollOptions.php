<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOptions extends Model
{
    use HasFactory;

    protected $table = 'polls_options';

    protected $fillable = [
        'poll_id',
        'option_text'
    ];
    function voteCount()
    {
        return PollVotes::where('option_id', $this->id)->count();
    }
}
