<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAllocation extends Model
{
    protected $table = 'question_allocation';

    public function creator_user() {
        return $this->belongsTo(User::class , 'creator','id');
    }

    public function uploader_user() {
        return $this->belongsTo(User::class , 'uploader','id');
    }
}
