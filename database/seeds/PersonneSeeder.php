<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Infrastructure\Models\Personne;

class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            Personne::insert([
                'firstname' => Str::random(30),
                'lastname' => Str::random(30),
                'age' =>random_int(18, 70),
                'birthdate' => date('Y-m-d',rand(1262055681,1262055681))
            ]);
        }
    }
}
