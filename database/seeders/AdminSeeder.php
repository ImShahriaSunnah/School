<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::Where('email', 'admin@example.com')->first();

        if(is_null($admin))
        {
            $admin = Admin::create([
                'name'      => 'Admin',
                'email'     => 'admin@example.com',
                'password'  => bcrypt('123456789'),
            ]);
        }
    }
}
