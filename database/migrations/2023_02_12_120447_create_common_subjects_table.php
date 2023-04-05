<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
            Schema::create('common_subjects', function (Blueprint $table) {
                $table->id();
                $table->string('code')->nullable();
                $table->string('name')->nullable();
                $table->string('group')->nullable()->comment('0=common, 1=science, 2=commerce, 3=arts');
                $table->foreignId('class')->nullable()->constrained('common_classess')->cascadeOnDelete();
                $table->string('status')->nullable();
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
        dd('hi');
        Schema::dropIfExists('common_subjects');
    }
}
