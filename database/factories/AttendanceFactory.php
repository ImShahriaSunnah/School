<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id'    => 915,
            'attendance'    => 0,
            'class_id'      => 20,
            'section_id'    => 17,
            'school_id'     => 3
        ];
    }
}
