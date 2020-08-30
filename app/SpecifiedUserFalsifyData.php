<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecifiedUserFalsifyData extends Model
{
    protected $table = 'specified_user_falsify_data';

    public function user()   {
        return $this->belongsTo(User::class);
    }
}
