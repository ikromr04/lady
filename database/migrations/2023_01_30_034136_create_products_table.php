<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
      $table->id();
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('description')->nullable();
      $table->string('category_id')->nullable();
      $table->string('prescription_id')->nullable();
      $table->string('image');
      $table->string('image_thumb');
      $table->string('file')->nullable();
      $table->string('url')->nullable();
      $table->longText('body')->nullable();
      $table->bigInteger('views')->default(0);
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
