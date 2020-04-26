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

    public function subtopic_name() {
        return $this->belongsTo(Subtopic::class , 'subtopic','id');
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

    public function question_set_element()   {
        return $this->HasOne(QuestionSetElement::class);
    }

    public function question_image() {
        if ($this->question_image() == 1)    {
            return 1;
        }   else    {
            return 0;
        }
    }

    public function total_attempt($fromDate, $untilDate) {
        $id = $this->id;

        if ($fromDate != 0)   {

            if($untilDate == 0)    {
                $total_attempt = Attempt::where('question_id', $id)->whereDate('created_at','>=',$fromDate)->count();
            }   else    {
                return 'error';
            }

        }   else    {

            $total_attempt = Attempt::where('question_id', $id)->count();

        }

        return $total_attempt;
    }

    public function earning_per_question($fromDate, $untilDate) {

        $rate = 0;

        $id = $this->id;

        if ($fromDate != 0)   {

            if($untilDate == 0)    {
                $total_attempt = Attempt::where('question_id', $id)->whereDate('created_at','>=',$fromDate)->count();
            }   else    {
                return 'error';
            }

        }   else    {

            $total_attempt = Attempt::where('question_id', $id)->count();

        }

        if(Question::find($id)->price != null)  {
            $question_price = Question::find($id)->price * 0.01 *11/15;
        }   else    {
            $question_price = 0;
        }

        return round($total_attempt*$question_price,3);
    }

}
