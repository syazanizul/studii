<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionCollectionGrandparent;
use App\QuestionCollectionParent;
use Illuminate\Http\Request;

class QuestionCollectionController extends Controller
{
    public function browse(int $collection_id)    {

        $collection_parent = QuestionCollectionParent::findOrFail($collection_id);

        if($collection_parent -> question_collection_type == 1)    {

            return false;

        }   else if ($collection_parent -> question_collection_type == 2)  {

            $characteristics = $collection_parent->question_collection_by_characteristics->first();

            $questions = Question::where('finished', 1);

            $questions = $questions -> where('exam', 1);

            if ($characteristics ->subject_id != 0) {
                $questions = $questions -> where('subject', $characteristics ->subject_id);
            }

            if ($characteristics -> level_id != 0) {
                $questions = $questions -> where('level', $characteristics -> level_id);
            }

            if ($characteristics -> chapter_id != 0) {
                $questions = $questions -> where('chapter', $characteristics -> chapter_id);
            }

            if ($characteristics -> subtopic_id != 0) {
                $questions = $questions -> where('subtopic', $characteristics -> subtopic_id);
            }

            if ($characteristics -> source_id != 0) {
                $questions = $questions -> where('source', $characteristics -> source_id);
            }

            if ($characteristics -> paper_id != 0) {
                $questions = $questions -> where('paper', $characteristics -> paper_id);
            }

            if ($characteristics -> year != 0) {
                $questions = $questions -> where('year', $characteristics -> year);
            }

            if ($characteristics -> difficulty_id != 0) {
                $questions = $questions -> where('difficulty', $characteristics -> difficulty_id);
            }

            if ($characteristics -> creator_id != 0)    {
                $questions = $questions -> where('creator', $characteristics -> creator_id);
            }

            if($collection_parent->randomize != 0)    {
                $questions = $questions->inRandomOrder()->get();
            }   else    {
                $questions = $questions->get();
            }

//            dd($questions);

            session() -> pull('qid');
            foreach ($questions as $question) {
                session() -> push('qid', $question->id);
            }

            return redirect('/practice?num=0');

        }

    }
}
