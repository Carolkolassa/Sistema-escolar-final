<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiais;
use App\Http\Requests\MaterialRequest;

class MateriaisController extends Controller
{
    public function index(Request $filtro)
    {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $materiais = Materiais::orderBy('nome')->paginate(5);
        else
            $materiais = Materiais::where('nome', 'like', '%' . $filtragem . '%')
                ->orderBy("nome")
                ->paginate(10)
                ->setpath('materiais?desc_filtro=' . $filtragem);

        return view('materiais.index', ['materiais' => $materiais]);
    }

    public function create()
    {
        return view('materiais.create');
    }

    public function store(MaterialRequest $request)
    {
        $novo_material = $request->all();
        Materiais::create($novo_material);

        return redirect()->route('materiais');
    }

    public function edit($id)
    {
        $materiais = Materiais::find($id);
        return view('materiais.edit', compact('materiais'));
    }

    public function update(MaterialRequest $request, $id)
    {
        Materiais::find($id)->update($request->all());
        return redirect()->route('materiais');
    }

    public function destroy($id)
    {

        try {
            Materiais::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
