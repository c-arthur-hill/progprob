<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
        	$table->bigIncrements('id');
		    $table->string('question');
            $table->string('answer');    
            $table->timestamps();
        });

        Schema::create('posts_posts', function (Blueprint $table) {
            $table->bigInteger('parent_id')->unsigned();
            $table->bigInteger('child_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('posts')
                ->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('posts_posts');
    }
}
