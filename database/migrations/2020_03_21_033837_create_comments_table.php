<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('user_id')->unsigned();
          $table->integer('parent_id')->nullable();
          $table->text('body');
          $table->integer('commentable_id')->unsigned()->nullable();
          $table->string('commentable_type')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
