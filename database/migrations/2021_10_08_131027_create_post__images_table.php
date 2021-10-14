<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post__images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')
            ->references('id')
            ->on('images')->onDelete('cascade');  
            $table->foreignId('post_id')
            ->references('id')
            ->on('posts')->onDelete('cascade');  
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
        Schema::dropIfExists('post__images');
    }
}
