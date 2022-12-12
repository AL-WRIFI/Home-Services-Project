<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();  
            $table->foreignId('user_id')->constrained('users','id')->OnDelete('cascade'); 
            $table->dateTime('service_schedule')->nullable();
            $table->text('note')->nullable(); 
            $table->foreignId('provider_id')->constrained('providers', 'id')->nullable()->OnDelete('null');
            $table->string('address');
            $table->bigInteger('service_address_id')->nullable();
            $table->string("payment_method");
            $table->bigInteger('payment_id')->unsigned();
            $table->bigInteger('orders_status_id')->unsigned();
            $table->boolean('cancel')->nullable()->default(0);
            $table->decimal('total_cost',24,3)->default(0);
            //$table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null')->onUpdate('set null');
            //$table->foreign('orders_status_id')->references('id')->on('orders_status')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('orders');
    }
};
