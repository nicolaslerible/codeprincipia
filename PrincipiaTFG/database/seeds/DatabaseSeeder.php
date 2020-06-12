<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['nombre' => 'administrador'],
            ['nombre' => 'usuario']
        ]);

        DB::table('levels')->insert([
            ['nombre' => 'Mercurio'],
            ['nombre' => 'Venus'],
            ['nombre' => 'Tierra'],
            ['nombre' => 'Marte'],
            ['nombre' => 'Júpiter'],
            ['nombre' => 'Saturno'],
            ['nombre' => 'Urano'],
            ['nombre' => 'Neptuno']
        ]);
    }
}
