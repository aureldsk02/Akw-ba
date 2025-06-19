<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('business_type');
            $table->string('website')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('country');
            $table->string('logo_path')->nullable();
            $table->string('theme')->default('modern');
            $table->boolean('has_ecommerce')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}; 