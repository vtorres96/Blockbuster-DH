<?php

use Illuminate\Database\Seeder;
use App\Filme;

class FilmesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Filme::class, 50)->create();
    }
}
