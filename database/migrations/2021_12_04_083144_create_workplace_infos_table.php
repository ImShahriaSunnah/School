<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplaceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workplace_infos', function (Blueprint $table) {
            $table->id();
            $table->string('workspace_name')->nullable();
            $table->string('student')->nullable();
            $table->string('teachers')->nullable();
            $table->string('hear_us')->nullable();
            $table->integer('price_id')->nullable();
            $table->double('payment_amount')->nullable();
            $table->timestamp('last_payment_at')->nullable();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
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
        Schema::dropIfExists('workplace_infos');
    }
}
