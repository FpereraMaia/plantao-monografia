<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role as Role;

class RolesSeeder extends Seeder
{
    /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('roles')->delete();

      Role::create([
      'name' => 'Administrador',
      'slug' => 'admin',
      'description' => 'Privilégio de administrador geral do sistema.'
    ]);

    Role::create([
    'name' => 'Funcionário',
    'slug' => 'func',
    'description' => 'Privilégio de funcionários.'
  ]);
  }
}
