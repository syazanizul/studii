<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSetElement extends Model
{
    protected $table = 'question_set_element';

    public function question_set()  {
        return $this -> belongsTo(QuestionSetParent::class, 'question_set_id','id');
    }

    public function question()  {
        return $this -> belongsTo(Question::class, 'question_id');
    }
}
