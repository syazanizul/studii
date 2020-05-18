<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingImage extends Model
{
    protected $table = 'working_image';

    public function working_parent()    {
        return $this->belongsTo(WorkingParent::class);
    }
}
