<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('cart_details',
        function (Blueprint $table) {
          $table->increments('id');

          // Foreign key
          $table->integer('cart_id')->unsigned();
          $table->foreign('cart_id')->references('id')->on('carts');

          // Foreign key
          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('products');

          $table->string('description');
          $table->float('quantity', 5, 2);
          $table->decimal('price', 12, 2);
          $table->double('discount', 5, 2)->default(0); // %
          $table->text('notes')->nullable();

          $table->timestamps();
        });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('cart_details');
  }
}
