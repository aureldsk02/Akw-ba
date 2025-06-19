<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('business_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('day');
            $table->time('open_morning')->nullable();
            $table->time('close_morning')->nullable();
            $table->time('open_afternoon')->nullable();
            $table->time('close_afternoon')->nullable();
            $table->boolean('is_fclosed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_hours');
    }
}; 