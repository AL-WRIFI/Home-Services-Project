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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->OnDelete('cascade');
            $table->string('name', 255);
            $table->string('image')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->foreignId('category_id')->constrained('categories', 'id')->nullable()->OnDelete('null');
            $table->string('description')->nullable();
            $table->integer('order_count')->unsigned()->default(0);
            $table->integer('rating_count')->unsigned()->default(0);
            $table->float('avg_rating',8,4)->default(0);
            $table->enum('status', ['active', 'inactive'])->nullable()->default('active');
            $table->boolean('featured')->nullable()->default(0);
            $table->boolean('accepted')->default(1);
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
        Schema::dropIfExists('providers');
    }
};
