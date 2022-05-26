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
        Nacionalidade::create(['descricao' => 'Brasileiro(a)']);
        Nacionalidade::create(['descricao' => 'Argentino(a)']);
        Nacionalidade::create(['descricao' => 'Chines(a)']);
        Nacionalidade::create(['descricao' => 'Turco(a)']);
        Nacionalidade::create(['descricao' => 'Boliviano(a)']);
        Nacionalidade::create(['descricao' => 'Ingles(a)']);
        Nacionalidade::create(['descricao' => 'Groinlandes(a)']);
        Nacionalidade::create(['descricao' => 'Indiano(a)']);
        Nacionalidade::create(['descricao' => 'Russo(a)']);
    }
}
