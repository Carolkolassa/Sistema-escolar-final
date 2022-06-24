<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilmeAtor;
use App\Models\Filme;
use App\Http\Requests\FilmeRequest;

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
        $filmes = Filme::paginate(20);
        return view('filmes.index', ['filmes' => $filmes]);           
    
    }

    public function destroy($id){

        try {
            FilmeAtor::where("filme_id", $id)->delete();
            Filme::find($id)->delete();
            $ret = array('status'=>200, 'msg'=> "null");
        } 
        catch (\Illuminate\Database\QueryException $e ){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        catch (\PDException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }
    
    public function edit($id)
    {
        $filme = Filme::find($id);
        return view('filmes.edit', compact('filme'));
    }

    public function update(FilmeRequest $request, $id)
    {
        Filme::find($id)->update($request->all());
        return redirect()->route('filmes');
    }

}
