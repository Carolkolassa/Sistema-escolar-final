<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nacionalidade;
use App\HTTP\Requests\NacionalidadeRequest;
use App\Models\Nacionalidade as ModelsNacionalidade;

class NacionalidadesController extends Controller
{
    public function index()
    {
        $nacionalidades = Nacionalidade::orderBy('descricao')->paginate(5);
        return view('nacionalidades.index', ['nacionalidades' => $nacionalidades]);
    }

    public function create()
    {
        return View('nacionalidades.create');
    }

    public function store(NacionalidadeRequest $request)
    {
        $novo_nacionalidade = $request->all();
        Nacionalidade::create($novo_nacionalidade);

        return redirect()->route('nacionalidades');
    }

    public function destroy($id)
    {
        try {
            Nacionalidade::find($id)->delete();
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
        $nacionalidade = Nacionalidade::find($id);
        return view('nacionalidades.edit', compact('nacionalidade'));
    }

    public function update(NacionalidadeRequest $request, $id)
    {
        Nacionalidade::find($id)->update($request->all());
        return redirect()->route('nacionalidades');
    }
}
