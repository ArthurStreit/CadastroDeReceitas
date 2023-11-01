<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\IngredientesReceita;
use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receitas = Receita::all();

        return view('receita.index', compact('receitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receita = new Receita;
        $ingredientes = Ingrediente::all();

        return view('receita.form', compact('receita', 'ingredientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ordem_value = [];
        foreach($request->input('ordem') as $ordem) {
            if (in_array($ordem, $ordem_value)) {
                return Redirect::back()->withErrors(['msg' => 'Não é possível retornar dois ingredientes com o mesmo número de ordem.']);
            }
            $ordem_value[] = $ordem;
        }
        $receita = new Receita;
        $receita->descricao = $request->input('descricao');
        $receita->save();

        $ordem = $request->input('ordem');
        $ingrediente = $request->input('ingrediente');

        for ($i = 0; $i < count($ordem); $i++)
        {
            $ingredientes_receita = new IngredientesReceita;
            $ingredientes_receita->receita_id = $receita->id;

            $ingredientes_receita->ordem = $ordem[$i];
            $ingredientes_receita->ingrediente_id = $ingrediente[$i];

            $ingredientes_receita->save();
        }

        return redirect('/receitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        $ingredientes = Ingrediente::all();
        $ingredientes_receita = IngredientesReceita::select('*')
            ->join('ingredientes', 'ingredientes.id', '=', 'ingrediente_id')
            ->where('receita_id', $receita->id)
            ->orderBy('ingredientes_receita.ordem')
            ->get();

        return view('receita.show', compact('receita', 'ingredientes', 'ingredientes_receita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
        $ingredientes = Ingrediente::all();
        $ingredientes_receita = IngredientesReceita::select('*')
            ->join('ingredientes', 'ingredientes.id', '=', 'ingrediente_id')
            ->where('receita_id', $receita->id)
            ->get();

        return view('receita.form', compact('receita', 'ingredientes', 'ingredientes_receita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receita $receita)
    {
        $receita->descricao = $request->input('descricao');
        $receita->save();

        $ordem = $request->input('ordem');
        $ingrediente = $request->input('ingrediente');

        $ingredientes_receita_ = IngredientesReceita::where('receita_id', $receita->id)->get();
        foreach ($ingredientes_receita_ as $ingrediente_receita_)
            $ingrediente_receita_->delete();

        for ($i = 0; $i < count($ordem); $i++)
        {
            $ingredientes_receita = new IngredientesReceita;
            $ingredientes_receita->receita_id = $receita->id;

            $ingredientes_receita->ordem = $ordem[$i];
            $ingredientes_receita->ingrediente_id = $ingrediente[$i];

            $ingredientes_receita->save();
        }

        return redirect('receitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
        $ingredientes_receita_ = IngredientesReceita::where('receita_id', $receita->id)->get();
        foreach ($ingredientes_receita_ as $ingrediente_receita_)
            $ingrediente_receita_->delete();

        $receita->delete();

        return response()->json([
            'sucesso'  => true,
            'mensagem' => 'Receita removida com sucesso!',
            'response_code' => 200
        ], 200);
    }
}