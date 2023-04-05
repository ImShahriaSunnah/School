<?php

namespace Database\Seeders;

use App\Models\CommonSubject;
use Illuminate\Database\Seeder;

class CommonSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(defaultSubjects() as $item)
        {
            CommonSubject::insert([
                'code'  =>  $item['code'],
                'name'  =>  $item['name'],
                'group' =>  $item['group'],
                'class' =>  $item['class'],
                'status' =>  $item['status'],
            ]);
        }
    }
}
