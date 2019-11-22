<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function content()
    {
        return $this -> belongsTo(Content::class);
    }
}
