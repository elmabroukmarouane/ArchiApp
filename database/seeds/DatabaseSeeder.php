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
        $this->call(PersonneSeeder::class);
        $this->call(EtudiantSeeder::class);
        $this->call(UserSeeder::class);
    }
}
