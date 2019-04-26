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
        // Sempre é rodado, e com esse DatabaseSeeder rodar outros Seeders
        $this->call(UsuariosSeeder::class);
        $this->call(AddACLSeeder::class);
    }
}
