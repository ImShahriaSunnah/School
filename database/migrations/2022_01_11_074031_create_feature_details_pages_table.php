<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureDetailsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_details_pages', function (Blueprint $table) {
            $table->id();
            $table->string('header_text_1')->nullable();
            $table->string('header_text_2')->nullable();
            $table->string('header_p_text_1')->nullable();
            $table->string('header_p_text_2')->nullable();
            $table->string('header_label_text_1')->nullable();
            $table->string('header_label_text_2')->nullable();
            $table->string('header_label_text_3')->nullable();
            $table->text('header_image')->nullable();
            $table->string('second_section_face_title_1')->nullable();
            $table->string('second_section_face_paragraph_1')->nullable();
            $table->text('second_section_face_image_1')->nullable();
            $table->string('second_section_face_title_2')->nullable();
            $table->string('second_section_face_paragraph_2')->nullable();
            $table->text('second_section_face_image_2')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('feature_details_pages');
    }
}
