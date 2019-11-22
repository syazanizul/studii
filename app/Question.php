<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function contents()
    {
        return $this -> hasMany(Content::class) -> orderBy('order');
    }

    public function subject_name() {
        return $this->belongsTo(Subject::class , 'subject','id');
    }

    public function level_name() {
        return $this->belongsTo(Level::class , 'level','id');
    }

    public function chapter_name() {
        return $this->belongsTo(Chapter::class , 'chapter','id');
    }

    public function source_name() {
        return $this->belongsTo(Source::class , 'source','id');
    }

    public function submitter1() {
        return $this->belongsTo(User::class , 'submitted_by1','id');
    }

    public function submitter2() {
        return $this->belongsTo(User::class , 'submitted_by2','id');
    }

}
