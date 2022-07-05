<?php

namespace Database\Seeders;

use App\Models\Nacionalidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NacionalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nacionalidade::create(['descricao' => 'Pré-A']);
        Nacionalidade::create(['descricao' => 'Pré-B']);
        Nacionalidade::create(['descricao' => '1ª Série']);
        Nacionalidade::create(['descricao' => '2ª Série']);
        Nacionalidade::create(['descricao' => '3ª Série']);
        Nacionalidade::create(['descricao' => '4ª Série']);
        Nacionalidade::create(['descricao' => '5ª Série']);
        Nacionalidade::create(['descricao' => '6ª Série']);
        Nacionalidade::create(['descricao' => '7ª Série']);
        Nacionalidade::create(['descricao' => '8ª Série']);
        Nacionalidade::create(['descricao' => '9ª Série']);
    }
}
