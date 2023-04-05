<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_admissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('dob');
            $table->string('f_name');
            $table->string('f_occupation')->nullable();
            $table->string('f_nid')->nullable();
            $table->string('f_phone')->nullable();
            $table->string('m_name');
            $table->string('m_occupation')->nullable();
            $table->string('m_phone')->nullable();
            $table->string('m_nid')->nullable();
            $table->string('gender');
            $table->string('blood_group')->nullable();
            $table->string('religion');
            $table->string('nationality');

          

            $table->string('pre_address');
            $table->string('par_address');
            $table->string('income');

            $table->string('g_name');
            $table->string('g_phone');
            $table->string('relation');

            $table->string('old_school');
            $table->string('In_class');
            $table->string('group')->nullable();
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
        Schema::dropIfExists('online_admissions');
    }
}
