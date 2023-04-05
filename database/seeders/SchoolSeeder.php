<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = School::Where('email', 'schools@example.com')->first();

        if(is_null($school))
        {
            $school = School::create([
                'name'      => 'Example',
                'email'     => 'schools@example.com',
                'password'  => bcrypt('123456789'),
            ]);
        }
    }
}
