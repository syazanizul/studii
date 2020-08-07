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

    public function subtopic_name() {
        return $this->belongsTo(Subtopic::class , 'subtopic','id');
    }

    public function source_name() {
        return $this->belongsTo(Source::class , 'source','id');
    }

    public function difficulty_name()   {
        switch ($this -> difficulty) {
            case 1:
                return $difficulty = 'Easy (1)';
                break;
            case 2:
                return $difficulty = 'Fair (2)';
                break;
            case 3:
                return $difficulty = 'Moderate (3)';
                break;
            case 4:
                return $difficulty = 'Hard (4)';
                break;
            case 5:
                return $difficulty = 'Harder (5)';
                break;
        }
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

    public function difficulty_rating() {
        return $this->hasMany(DifficultyRating::class);
    }

    public function attempt()   {
        return $this->hasMany(Attempt::class);
    }

    // === Non-relationship functions -----------------------------------------------------

    public function question_image() {
        if ($this->question_image() == 1)    {
            return 1;
        }   else    {
            return 0;
        }
    }


    public function question_price()    {
        if(Question::find($this->id)->price != null)  {
            $question_price = Question::find($this->id)->price * 0.01;
        }   else    {
            $question_price = 0;
        }
        return $question_price;
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

        $total_attempt = $this->total_attempt($fromDate, $untilDate);

        $question_price = $this->question_price();

        return round($total_attempt*$question_price,3);
    }


    public function improved_earning_per_question($user_id, $fromDate, $untilDate) {
        $earning_creator = 0;
        $earning_uploader = 0;
        $earning_working = 0;
        $earning_language = 0;
        $earning_total = 0;

        if($untilDate == 0)    {
            $attempt = Attempt::where('question_id', $this->id)->whereDate('created_at','>=',$fromDate)->get();

            foreach ($attempt as $m) {

                $question_price = $m->question->question_price();

                $portion = 0;

                if($m->creator == $user_id)    {
                    $portion += 9/14;
//                    $earning_creator += 9/14 * $question_price;
                }

                if($m->uploader == $user_id)    {
                    $portion += 2/14;
//                    $earning_uploader += 2/14 * $question_price;
                }

                if($m->working == $user_id)    {
                    $portion += 2/14;
//                    $earning_working += 2/14 * $question_price;
                }

                if($m->language == $user_id)    {
                    $portion += 2/14;
//                    $earning_language += 1/14 * $question_price;
                }

                $earning_total += $portion*$question_price;
            }

            return $earning_total;

        }   else    {
            return false;
        }

    }


    public function total_difficulty_rating()   {
       return $this->difficulty_rating()->count();
    }
}
