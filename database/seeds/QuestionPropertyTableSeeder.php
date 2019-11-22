<?php

use Illuminate\Database\Seeder;

class QuestionPropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //exam table
        $exams = array('Sijil Pelajaran Malaysia','SPM');

        DB::table('exams_list')->insert([
            'name' => $exams[0],
            'name_shortened' => $exams[1],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //subject list
        $subjects = array('Add Math', 'Physics');

        foreach($subjects as $subject)   {
            DB::table('subjects_list')->insert([
                'name' => $subject,
                'exam' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        //source list
        $sources = array('Self Made', '-');

        DB::table('sources_list')->insert([
            'name' => $sources[0],
            'copyright' => $sources[1],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //level list
        $levels = array('Form 4', 'Form 5');

        foreach ($levels as $level) {
            DB::table('levels_list')->insert([
                'name' => $level,
                'exam' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        //chapter list
        $chapters = array('Function', 'Quadratic Equation', 'Quadratic Function');

        foreach ($chapters as $chapter) {
            DB::table('chapters_list')->insert([
                'name' => $chapter,
                'subject' => 1,
                'level' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
