<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCollectionElement extends Model
{
    protected $table = 'question_collection_element';

    public function question_collection_parent()    {
        return $this -> belongsTo(QuestionCollectionParent::class, 'question_collection_parent_id','id');
    }
}
