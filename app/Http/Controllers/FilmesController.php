<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilmeAtor;
use App\Models\Filme;

class FilmesController extends Controller
{

public function create() {
    return view('filmes.create');
         }


    public function store(Request $request) {
    $filme = Filme::create([
                    'nome' => $request->get('nome'),
                    'categoria' => $request->get('categoria')

            ]);

        $atores = $request -> atores;
        foreach($atores as $a => $value) {
            FilmeAtor::create([
        'filme_id' => $filme->id,
        'ator_id' => $atores[$a]
         ]);
    }
        return redirect()->route('filmes');
    }

    public function index() {
        $filmes = Filme::all();
        return view('filmes.index', ['filmes' => $filmes]);           
    
    }

}
