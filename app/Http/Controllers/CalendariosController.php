<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario;
use App\Http\Requests\CalendarioRequest;


class CalendariosController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $calendarios = Calendario::orderBy('nome')->paginate(5);
        else
        $calendarios = Calendario::where('nome', 'like', '%'.$filtragem.'%')
                      ->orderBy("nome")
                      ->paginate(10)
                      ->setpath('calendarios?desc_filtro='.$filtragem);

    return view('calendarios.index', ['calendarios' => $calendarios]);
       
    }
    
    public function create()
    {
        return view('calendarios.create');
    }

    public function store(CalendarioRequest $request)
    {
        $novo_calendario = $request->all();
        Calendario::create($novo_calendario);

        return redirect()->route('calendarios');
    }

    public function destroy($id){

        try {
        Calendario::find($id)->delete();
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
        $Calendario = Calendario::find($id);
        return view('calendarios.edit', compact('Calendario'));
    }

    public function update(CalendarioRequest $request, $id)
    {
        Calendario::find($id)->update($request->all());
        return redirect()->route('calendarios');
    }
}
