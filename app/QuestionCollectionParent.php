<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCollectionParent extends Model
{
    protected $table = 'question_collection_parent';

    //    For Type 1
    public function question_collection_element()  {
        return $this->hasMany(QuestionCollectionElement::class);
    }

    //    For Type 2
    public function question_collection_by_characteristics()    {
        return $this->hasMany(QuestionCollectionByCharacteristics::class);
    }
}
