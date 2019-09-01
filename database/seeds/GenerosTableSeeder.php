<?php

use Illuminate\Database\Seeder;
use App\Genero;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::create([
            "descricao" => "Ação"
        ]);

        Genero::create([
            "descricao" => "Drama"
        ]);

        Genero::create([
            "descricao" => "Ficção"
        ]);

        Genero::create([
            "descricao" => "Romance"
        ]);

        Genero::create([
            "descricao" => "Suspense"
        ]);

        Genero::create([
            "descricao" => "Terror"
        ]);
    }
}
