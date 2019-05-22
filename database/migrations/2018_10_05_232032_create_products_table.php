<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 100)->nullable();
            $table->string('name', 500)->nullable();
            $table->string('slug', 500)->nullable();
            $table->double('old_price', 15, 0)->default(0);
            $table->double('new_price', 15, 0)->default(0);
            $table->string('image', 500)->nullable();
            $table->text('image_detail')->nullable();
            $table->integer('category_id');
            $table->string('description', 5000)->nullable();
            $table->integer('qty')->default(0);
            $table->string('specification')->nullable();
            $table->integer('user_update');
            $table->string('tag', 1000)->nullable();

            $table->string('meta_title', 500)->nullable();
            $table->string('meta_keyword', 500)->nullable();
            $table->string('meta_description', 1000)->nullable();
            $table->string('meta_content', 1000)->nullable();

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
        Schema::dropIfExists('products');
    }
}
