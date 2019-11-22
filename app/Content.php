<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class) ;
    }

    public function symbol($id)
    {
        $numbering = Content::select('numbering')->where('question_id', $id) ->orderBy('order')->get();
        $symbol = array();
       // dd($numbering);

        $j = 0;
//        dd($numbering -> numbering);
        for($i = 0; $i < 7; $i++)   {
            //dd($n-> numbering);
            if (isset($numbering[$i] -> numbering)) {
                switch ($numbering[$i] -> numbering)    {
                    case 0:
                        $symbol[$j] = ' ';
                        break;
                    case 1:
                        $symbol[$j] = 'a)';
                        break;
                    case 2:
                        $symbol[$j] = 'b)';
                        break;
                    case 3:
                        $symbol[$j] = 'c)';
                        break;
                    case 4:
                        $symbol[$j] = 'd)';
                        break;
                    case 5:
                        $symbol[$j] = 'e)';
                        break;
                    default:
                        $symbol[$j] = "";
                        break;
                }

            }   else    {
                $symbol[$j] = " ";
            }
            $j++;
        }

        return $symbol;
    }
}
