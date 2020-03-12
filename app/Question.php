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

    public function creator_info() {
        return $this->belongsTo(User::class , 'creator','id');
    }

    public function uploader_info() {
        return $this->belongsTo(User::class , 'uploader','id');
    }

    public function question_allocation()   {
        return $this->HasOne(QuestionAllocation::class);
    }

    public function question_image() {
        if ($this->question_image() == 1)    {
            return 1;
        }   else    {
            return 0;
        }
    }

    public function total_attempt() {
        $id = $this->id;

        $total_attempt = DB::table('count_attempt')->where('question_id', $id)->count();

        return $total_attempt;
    }

    public function earning_per_question() {
        $id = $this->id;

        $total_attempt = Attempt::where('question_id', $id)->count();

        if(Question::find($id)->price != null)  {
            $question_price = Question::find($id)->price*0.01;
        }   else    {
            $question_price = 0;
        }

        return $total_attempt*$question_price;
    }

}
