<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('post_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('post')->references('id')->on('posts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_likes');
    }
};
