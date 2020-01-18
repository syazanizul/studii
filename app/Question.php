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

    public function difficulty_name()   {
        switch ($this -> difficulty) {
            case 1:
                $difficulty = 'Easy (1)';
                break;
            case 2:
                $difficulty = 'Fair (2)';
                break;
            case 3:
                $difficulty = 'Moderate (3)';
                break;
            case 4:
                $difficulty = 'Hard (4)';
                break;
            case 5:
                $difficulty = 'Harder (5)';
                break;
        }

        return $difficulty;
    }

    public function submitter1() {
        return $this->belongsTo(User::class , 'submitted_by1','id');
    }

    public function submitter2() {
        return $this->belongsTo(User::class , 'submitted_by2','id');
    }

    public function question_image() {
        if ($this->question_image() == 1)    {
            return 1;
        }   else    {
            return 0;
        }
    }

    public static function give_subject_name($subject_id) {
        return DB::table('subjects_list')->where('id', $subject_id)->pluck('name')[0];
    }

    public static function give_chapter_name($chapter_id) {
        return DB::table('chapters_list')->where('id', $chapter_id)->pluck('name')[0];
    }

}
