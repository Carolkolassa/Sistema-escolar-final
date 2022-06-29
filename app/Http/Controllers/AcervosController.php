<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acervo;
use App\Http\Requests\AcervoRequest;

class AcervosController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $acervos = Acervo::orderBy('nome')->paginate(5);
        else
        $acervos = Acervo::where('nome', 'like', '%'.$filtragem.'%')
                      ->orderBy("nome")
                      ->paginate(10)
                      ->setpath('acervos?desc_filtro='.$filtragem);

    return view('acervos.index', ['acervos' => $acervos]);
       
}
    public function create()
    {
        return view('acervos.create');
    }

    public function store(AcervoRequest $request)
    {
        $novo_acervo = $request->all();
        Acervo::create($novo_acervo);

        return redirect()->route('acervos');
    }

    public function edit($id)
    {
        $acervos = Acervo::find($id);
        return view('acervos.edit', compact('acervos'));
    }

    public function update(AcervoRequest $request, $id)
    {
        Acervo::find($id)->update($request->all());
        return redirect()->route('acervos');
    }

    public function destroy($id){

        try {
        Acervo::find($id)->delete();
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
