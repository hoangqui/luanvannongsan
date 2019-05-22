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
            $table->increments('id');

            $table->string('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('description')->nullable();
            $table->longtext('content')->nullable();
            $table->string('tag')->nullable();
            $table->integer('user_create')->nullable();
            $table->integer('remove')->default(0);
            $table->integer('hot')->default(0);
            $table->integer('view')->default(0);
            $table->integer('prioritize')->default(0);
            $table->string('url_image')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_content')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('status', 10)->default('AVAILABLE');

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
        Schema::dropIfExists('posts');
    }
}
