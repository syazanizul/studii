<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerParent extends Model
{
    protected $table = 'answer_parent';

    public function content()
    {
        return $this -> belongsTo(Content::class);
    }

    public function answer_element()
    {
        return $this -> hasMany(AnswerElement::class);
    }

    public function working_parent()    {
        return $this-> hasMany(WorkingParent::class);
    }
}
