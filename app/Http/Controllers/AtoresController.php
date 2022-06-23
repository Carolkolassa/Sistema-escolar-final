<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ator;
use App\Http\Requests\AtorRequest;

class AtoresController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $atores = Ator::orderBy('nome')->paginate(5);
        else
        $atores = Ator::where('nome', 'like', '%'.$filtragem.'%')
                      ->orderBy("nome")
                      ->paginate(10)
                      ->setpath('atores?desc_filtro='.$filtragem);

    return view('atores.index', ['atores' => $atores]);
       
    }
    public function create()
    {
        return view('atores.create');
    }

    public function store(AtorRequest $request)
    {
        $novo_ator = $request->all();
        Ator::create($novo_ator);

        return redirect()->route('atores');
    }

    public function destroy($id){

        try {
        Ator::find($id)->delete();
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
        $ator = Ator::find($id);
        return view('atores.edit', compact('ator'));
    }

    public function update(AtorRequest $request, $id)
    {
        Ator::find($id)->update($request->all());
        return redirect()->route('atores');
    }
}
