<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function give_subject_name($subject_id) {
        return DB::table('subjects_list')->where('id', $subject_id)->pluck('name')[0];
    }

    public static function give_chapter_name($chapter_id) {
        return DB::table('chapters_list')->where('id', $chapter_id)->pluck('name')[0];
    }

}
