<?php

namespace Database\Seeders;

use App\Models\CommonClass;
use Illuminate\Database\Seeder;

class CommonClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'title' =>  "Play",
                "section"   =>  null,
                'class' =>  0
            ],
            [
                'title' =>  "Nursery",
                "section"   =>  null,
                'class' =>  0
            ],
            [
                'title' =>  "Class One",
                "section"   =>  null,
                'class' =>  1
            ],
            [
                'title' =>  "Class Two",
                "section"   =>  null,
                'class' =>  2
            ],
            [
                'title' =>  "Class Three",
                "section"   =>  null,
                'class' =>  3
            ],
            [
                'title' =>  "Class Four",
                "section"   =>  null,
                'class' =>  4
            ],
            [
                'title' =>  "Class Five",
                "section"   =>  null,
                'class' =>  5
            ],
            [
                'title' =>  "Class Six",
                "section"   =>  null,
                'class' =>  6
            ],
            [
                'title' =>  "Class Seven",
                "section"   =>  null,
                'class' =>  7
            ],
            [
                'title' =>  "Class Eight",
                "section"   =>  null,
                'class' =>  8
            ],
            [
                'title' =>  "Class Nine",
                "section"   =>  null,
                'class' =>  9
            ],
            [
                'title' =>  "Class Ten",
                "section"   =>  null,
                'class' =>  10
            ],
            [
                'title' =>  "Class Eleven",
                "section"   =>  null,
                'class' =>  11
            ],
            [
                'title' =>  "Class Tweleve",
                "section"   =>  null,
                'class' =>  12
            ],
            [
                'title' =>  "A",
                "section"   =>  1,
                'class' =>  null
            ],
            [
                'title' =>  "B",
                "section"   =>  1,
                'class' =>  null
            ],
            [
                'title' =>  "C",
                "section"   =>  1,
                'class' =>  null
            ],
            [
                'title' =>  "D",
                "section"   =>  1,
                'class' =>  null
            ],
            [
                'title' =>  "E",
                "section"   =>  1,
                'class' =>  null
            ]
        ];



        foreach($classes as $class){
            CommonClass::insert([
                'title' =>  $class['title'],
                'section'   =>  $class['section'],
                'class' =>  $class['class']
            ]);
        }
    }
}
