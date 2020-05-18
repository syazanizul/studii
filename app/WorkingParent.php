<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingParent extends Model
{
    protected $table = 'working_parent';

    public function answer_parent() {
        return $this->belongsTo(AnswerParent::class);
    }

    public function working_image() {
        return $this->hasOne(WorkingImage::class);
    }

    public function working_text()  {
        return $this->hasOne(WorkingText::class);
    }
}
