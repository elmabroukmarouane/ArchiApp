<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Infrastructure\Models\Etudiant;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            Etudiant::insert([
                'personne_id' => $i + 1,
                'school' => Str::random(30),
                'level' => Str::random(30)
            ]);
        }
    }
}
