<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBiginteger('follow_id');

            $table->timestamps();

            $table->unique(['user_id', 'follow_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('follow_id')->references('id')->on('users');
        });

        Schema::create('books', function (Blueprint $table){
            $table->unsignedBiginteger('isbn');

            $table->string('author');
            $table->string('title');
            $table->string('image_url');
            $table->text('item_caption');

            $table->timestamps();
            $table->primary('isbn');
        });

        
        Schema::create('reviews', function (Blueprint $table){
            $table->id();
            
            $table->text('content');
            $table->unsignedBiginteger('user_id');
            $table->unsignedBiginteger('book_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('isbn')->on('books');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('content');

            $table->unsignedBiginteger('user_id');
            $table->unsignedBigInteger('review_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('review_id')->references('id')->on('reviews');
        });

        Schema::create('likes', function (Blueprint $table){
            $table->id();

            $table->unsignedBiginteger('user_id');
            $table->unsignedBiginteger('review_id');

            $table->timestamps();

            $table->unique(['user_id', 'review_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('review_id')->references('id')->on('reviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('books');
    }
}
