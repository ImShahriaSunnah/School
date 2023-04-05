<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentApplibleFees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_applible_fees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("month_id")->default('0');
            $table->string("applied_item")->default(json_encode(['absent','absent_after_break']));
            $table->integer('class_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_applible_fees');
    }
}
