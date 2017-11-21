<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    User::create([
        'name'       => 'Norberto',
        'email'      => 'info@nute.com.ar',
        'password'   => bcrypt('password'),
        'last_name'  => 'Trosman',
        'land_phone' => '4111-2222',
        'cel_phone'  => '15-3333-4444',
        'address'    => 'Corrientes 5555 Piso 1 Dto 2',
        'city'       => 'CABA',
        'admin'      => true,
    ]);
    User::create([
        'name'       => 'Luz',
        'email'      => 'lmfrancione@lmf.com.ar',
        'password'   => bcrypt('password'),
        'last_name'  => 'Francione',
        'land_phone' => '4444-5555',
        'cel_phone'  => '15-6666-7777',
        'address'    => 'Juan B Justo 999 Piso 10 Dto B',
        'city'       => 'CABA',
        'admin'      => false,
    ]);
    //
  }
}
