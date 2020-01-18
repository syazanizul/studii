<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerElement extends Model
{
    protected $table = 'answer_elements';

    public function content()
    {
        return $this -> belongsTo(AnswerParent::class);
    }
}
