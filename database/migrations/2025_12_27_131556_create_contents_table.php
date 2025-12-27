<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('group');
            $table->string('type')->default('text');
            $table->text('value_ru')->nullable();
            $table->text('value_en')->nullable();
            $table->string('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contents');
    }
};