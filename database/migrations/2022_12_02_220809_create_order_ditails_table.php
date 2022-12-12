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
        Schema::create('order_ditails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders','id')->OnDelete('cascade');
            $table->foreignId('service_id')->constrained('services','id')->nullable()->OnDelete('null');
            $table->decimal('service_cost',24,3)->default(0);
            $table->integer('quantity')->default(0);
            $table->decimal('total_cost',24,3)->default(0);
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
        Schema::dropIfExists('order_ditails');
    }
};
