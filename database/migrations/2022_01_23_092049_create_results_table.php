<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->string('student_roll_number')->nullable();
            $table->bigInteger('institute_class_id')->constrained('institute_classes')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('term_id')->constrained('terms')->cascadeOnDelete();
            $table->foreignId('institute_class_id')->constrained('institute_classes')->cascadeOnDelete();
            $table->integer('attendance')->default(0);
            $table->integer('assignment')->default(0);
            $table->integer('class_test')->default(0);
            $table->integer('presentation')->default(0);
            $table->integer('quiz')->default(0);
            $table->integer('practical')->default(0);
            $table->integer('written')->default(0);
            $table->integer('mcq')->default(0);
            $table->integer('others')->default(0);
            $table->integer('total')->default(0);
            $table->string('grade')->default(0);
            $table->string('gpa')->default(0);
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
        Schema::dropIfExists('results');
    }
}
