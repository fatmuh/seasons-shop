<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('users_id');
            $table->string('product_id');
            $table->string('order_pcs')->nullable();
            $table->string('price_total')->nullable();
            $table->string('order_time')->nullable();
            $table->string('type_of_payment')->nullable();
            $table->longText('proof_of_payment')->nullable();
            $table->enum('status', ['Pending', 'Processing', 'Completed']);
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('payment');
    }
}
