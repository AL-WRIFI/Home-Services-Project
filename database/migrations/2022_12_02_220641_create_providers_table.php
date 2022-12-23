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
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->string('phone')->nullable()->unique();
            $table->string('address');
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->string('description')->nullable();
            $table->string('identity_type')->nullable();
            $table->integer('identity_Number')->nullable();
            $table->string('identification_Image')->nullable();
            $table->integer('order_count')->unsigned()->default(0);
            $table->integer('rating_count')->unsigned()->default(0);
            $table->float('avg_rating',8,4)->default(0);
            $table->boolean('status')->default(1);
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
