<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\Assessment;
use App\Models\User;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentOne = User::where('email', '=', 'gill0331@flinders.edu.au')->first();
        $studentTwo = User::where('email', '=', 'fern0001@flinders.edu.au')->first();
        $lecturer = User::where('email', '=', 'wilk0001@flinders.edu.au')->first();

        /*
         * Create Topics and Assessments
         */
        $ics = Topic::create([
            'topic_code' => 'COMP3751',
            'topic_name' => 'Interactive Computer Systems',
            'semester' => Topic::FIRST_SEMESTER,
            'year' => 2021,
            'lecturer_id' => $lecturer->id
        ]);

        $cp1 = Topic::create([
            'topic_code' => 'COMP1001',
            'topic_name' => 'Computer Programming 1',
            'semester' => Topic::FIRST_SEMESTER,
            'year' => 2021,
            'lecturer_id' => $lecturer->id
        ]);

        $cm = Topic::create([
            'topic_code' => 'COMP2781',
            'topic_name' => 'Computer Mathematics',
            'semester' => Topic::FIRST_SEMESTER,
            'year' => 2021,
            'lecturer_id' => $lecturer->id
        ]);

        $math1 = Topic::create([
            'topic_code' => 'MATH1001',
            'topic_name' => 'Mathematics 1A',
            'semester' => Topic::FIRST_SEMESTER,
            'year' => 2021,
            'lecturer_id' => $lecturer->id
        ]);

        Assessment::create([
            'name' => 'Workshop 1',
            'type' => Assessment::TYPE_WORKSHOP,
            'topic_id' => $ics->id
        ]);
        Assessment::create([
            'name' => 'Workshop 2',
            'type' => Assessment::TYPE_WORKSHOP,
            'topic_id' => $ics->id
        ]);
        Assessment::create([
            'name' => 'Quiz 1',
            'type' => Assessment::TYPE_TEST,
            'topic_id' => $ics->id
        ]);
        Assessment::create([
            'name' => 'Tutorial 1',
            'type' => Assessment::TYPE_TUTORIAL,
            'topic_id' => $ics->id
        ]);
        Assessment::create([
            'name' => 'Quiz 2',
            'type' => Assessment::TYPE_TEST,
            'topic_id' => $ics->id
        ]);

        Assessment::create([
            'name' => 'Lecture 1',
            'type' => Assessment::TYPE_LECTURE,
            'topic_id' => $cp1->id
        ]);
        Assessment::create([
            'name' => 'Lecture 2',
            'type' => Assessment::TYPE_LECTURE,
            'topic_id' => $cp1->id
        ]);
        Assessment::create([
            'name' => 'Practical 1',
            'type' => Assessment::TYPE_TUTORIAL,
            'topic_id' => $cp1->id
        ]);

        Assessment::create([
            'name' => 'General Feedback',
            'type' => Assessment::TYPE_GENERAL,
            'topic_id' => $cm->id
        ]);
        Assessment::create([
            'name' => 'Lecture 1',
            'type' => Assessment::TYPE_LECTURE,
            'topic_id' => $cm->id
        ]);
        Assessment::create([
            'name' => 'Workshop 1',
            'type' => Assessment::TYPE_WORKSHOP,
            'topic_id' => $cm->id
        ]);
        Assessment::create([
            'name' => 'Test 1',
            'type' => Assessment::TYPE_TEST,
            'topic_id' => $cm->id
        ]);

        Assessment::create([
            'name' => 'General Feedback',
            'type' => Assessment::TYPE_GENERAL,
            'topic_id' => $math1->id
        ]);
        Assessment::create([
            'name' => 'Lecture 1',
            'type' => Assessment::TYPE_LECTURE,
            'topic_id' => $math1->id
        ]);
        Assessment::create([
            'name' => 'Tutorial 1',
            'type' => Assessment::TYPE_TUTORIAL,
            'topic_id' => $math1->id
        ]);
        Assessment::create([
            'name' => 'Test 1',
            'type' => Assessment::TYPE_TEST,
            'topic_id' => $math1->id
        ]);

        $studentOne->topics()->attach($ics);
        $studentOne->topics()->attach($cm);


        $studentTwo->topics()->attach($ics);
        $studentTwo->topics()->attach($cp1);
        $studentTwo->topics()->attach($math1);
    }
}
