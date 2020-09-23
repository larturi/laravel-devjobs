<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SalarioSeeder;
use Database\Seeders\UsuarioSeeder;
use Database\Seeders\UbicacionSeeder;
use Database\Seeders\CategoriasSeeder;
use Database\Seeders\ExperienciaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriasSeeder::class);
        $this->call(ExperienciaSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(UbicacionSeeder::class);
        $this->call(SalarioSeeder::class);
    }
}
