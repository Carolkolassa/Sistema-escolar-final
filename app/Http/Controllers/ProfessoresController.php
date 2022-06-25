<?php

namespace App\Http\Controllers;
use App\Models\Professor;
use App\Http\Requests\ProfessorRequest;

use Illuminate\Http\Request;

class ProfessoresController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $professores = Professor::orderBy('nome')->paginate(5);
        else
        $professores = Professor::where('nome', 'like', '%'.$filtragem.'%')
                      ->orderBy("nome")
                      ->paginate(10)
                      ->setpath('professores?desc_filtro='.$filtragem);

    return view('professores.index', ['professores' => $professores]);
       
    }


    public function create()
    {
        return view('professores.create');
    }

    public function store(ProfessorRequest $request)
    {
        $novo_professor = $request->all();
        Professor::create($novo_professor);

        return redirect()->route('professores');
    }

    public function edit($id)
    {
        $professor = Professor::find($id);
        return view('professores.edit', compact('professor'));
    }

    public function update(ProfessorRequest $request, $id)
    {
        Professor::find($id)->update($request->all());
        return redirect()->route('professores');
    }

    public function destroy($id){

        try {
        Professor::find($id)->delete();
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

