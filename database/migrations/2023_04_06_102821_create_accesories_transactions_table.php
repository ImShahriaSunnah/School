<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoriesTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesories_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('roll')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('quantity')->nullable();
            $table->string('accesories')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('accesories_transactions');
    }
}
