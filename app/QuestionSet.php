<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model
{
    protected $table = 'question_set';

    public function question_set_element()  {
        return $this->hasMany(QuestionSetElement::class);
    }
}
