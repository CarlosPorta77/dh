<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('carts',
        function (Blueprint $table) {
          $table->increments('id');

          $table->dateTime('order_date');
          $table->dateTime('estimated_date');
          $table->dateTime('delivered_date')->nullable();
          $table->string('status'); // Active, Pending, Approved, Cancelled, Finished

          // Foreign key
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

          $table->string('shipping_address');
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
    Schema::dropIfExists('carts');
  }
}
