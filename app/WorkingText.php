<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingText extends Model
{
    protected $table = 'working_text';

    public function working_parent()    {
        return $this->belongsTo(WorkingParent::class);
    }
}
