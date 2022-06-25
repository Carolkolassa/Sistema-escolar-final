<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direcao;
use App\Http\Requests\DirecaoRequest;

class DirecoesController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $direcoes = Direcao::orderBy('nome')->paginate(5);
        else
        $direcoes = Direcao::where('nome', 'like', '%'.$filtragem.'%')
                      ->orderBy("nome")
                      ->paginate(10)
                      ->setpath('direcoes?desc_filtro='.$filtragem);

    return view('direcoes.index', ['direcoes' => $direcoes]);
       
}
    public function create()
    {
        return view('direcoes.create');
    }

    public function store(DirecaoRequest $request)
    {
        $novo_direcao = $request->all();
        Direcao::create($novo_direcao);

        return redirect()->route('direcoes');
    }

    public function edit($id)
    {
        $direcoes = Direcao::find($id);
        return view('direcoes.edit', compact('direcoes'));
    }

    public function update(DirecaoRequest $request, $id)
    {
        Direcao::find($id)->update($request->all());
        return redirect()->route('direcoes');
    }

    public function destroy($id){

        try {
        Direcao::find($id)->delete();
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
    
}
