<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('status')->insert([
          'name' => 'Disponível',
          'codigo' => 1,
      ]);

      DB::table('status')->insert([
          'name' => 'Em negociação',
          'codigo' => 2,
      ]);

      DB::table('status')->insert([
          'name' => 'Reservado',
          'codigo' => 3,
      ]);

      DB::table('status')->insert([
          'name' => 'Vendido',
          'codigo' => 4,
      ]);

    }
}
