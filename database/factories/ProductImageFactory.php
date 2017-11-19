<?php

use Faker\Generator as Faker;
use App\ProductImage;

$factory->define(ProductImage::class,
    function (Faker $faker) {
      return [
          'image'      => $faker->imageUrl(480, 700),
          'product_id' => $faker->numberBetween(1, 100),
      ];
    });
