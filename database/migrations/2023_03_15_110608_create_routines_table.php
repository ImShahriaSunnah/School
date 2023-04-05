<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->casecadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->casecadeOnDelete();
            $table->foreignId('class_id')->constrained('institute_classes')->casecadeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->casecadeOnDelete();
            $table->foreignId('teacher_id')->constrained('teachers')->casecadeOnDelete();
            $table->foreignId('period_id')->constrained('class_periods')->casecadeOnDelete();
            $table->tinyInteger('shift')->default(2)->comment('1=Morning; 2=day; 3=evening');
            $table->string('day')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routines');
    }
}
