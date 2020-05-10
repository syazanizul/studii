<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCollectionByCharacteristics extends Model
{
    protected $table = 'question_collection_by_characteristics';

    public function question_collection_grandparent()  {
        return $this->belongsTo(QuestionCollectionGrandparent::class, 'question_collection_id','id');
    }
}
