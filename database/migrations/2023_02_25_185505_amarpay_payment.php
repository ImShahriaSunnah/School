<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmarpayPayment extends Migration
{
    /**
     * Run the migrations.
     
     * @return void
     */
    public function up()
    {
        Schema::create('amarpay_payments', function (Blueprint $table) {
            $table->id();
            $table->string('store_id');
            $table->string('payment_type');
            $table->string('currency')->default('BDT');
            $table->integer('tran_id');
            $table->string('cus_name');
            $table->string('cus_email');
            $table->string('cus_add1');
            $table->string('cus_add2');
            $table->string('cus-city');
            $table->string('cus_state');
            $table->string('cus_postcode');
            $table->string('cus_country');
            $table->string('cus_phone');
            $table->string('cus_fax')->nullable();
            $table->string('ship_add1')->default('House-155, Road-18, sector-10, Uttara');
            $table->string('ship_add2')->default('House-155, Road-18, sector-10, Uttara');
            $table->string('ship_city')->default('Dhaka');
            $table->string('ship_state')->default('Dhaka');
            $table->string('ship_postcode')->default('1230');
            $table->string('ship_country')->default('Bangladesh');
            $table->string('desc')->default('payment description');
            $table->string('otp_a')->nullable();
            $table->string('otp_b')->nullable();
            $table->string('otp_c')->nullable();
            $table->string('otp_d')->nullable();
            $table->string('signature_key')->nullable();
            $table->integer('pay_amount');
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
        Schema::dropIfExists('amarpay_payments');
    }
}
