<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSetParent extends Model
{
    protected $table = 'question_set';

    public function question_set_element()  {
        return $this->hasMany(QuestionSetElement::class, 'question_set_id','id');
    }
}
