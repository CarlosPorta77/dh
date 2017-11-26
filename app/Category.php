<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
  public static $rules    = ['name' => 'required|min:3', 'description' => 'max:200',];

  public static $messages = ['name.required'   => 'El nombre es requerido',
                             'name.min'        => 'El nombre debe tener al menos 3 caracteres',
                             'description.max' => 'La descripción puede tener máximo 200 caracteres',
  ];

  protected     $fillable = ['name', 'description'];

  public function products() {
    return $this->hasMany(Product::class);
  }
  //
}
