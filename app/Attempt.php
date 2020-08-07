<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $table = 'count_attempt';

    public function question()  {
        return $this->belongsTo(Question::class);
    }
}
