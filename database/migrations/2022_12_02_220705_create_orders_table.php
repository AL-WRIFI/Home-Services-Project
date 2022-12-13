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
            $table->foreignId('category_id')->constrained('categories', 'id')->nullable()->OnDelete('null');
            $table->foreignId('provider_id')->constrained('providers', 'id')->nullable()->OnDelete('null');  
            $table->text('note')->nullable();     
            $table->string('address')->nullable();
            $table->bigInteger('service_address_id')->nullable();
            $table->dateTime('service_schedule')->nullable();
            $table->string('order_status')->default('pending');
            //$table->enum('order_status', ['pending', 'accepted','ongoing','completed','canceled'])->default(['pending']);
            $table->decimal('total_cost',24,3)->default(0);
            //$table->string("payment_method");
            //$table->bigInteger('payment_id')->unsigned();
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
