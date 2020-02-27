<?php

namespace App\Http\Controllers;

use App\Orcamento;
use Illuminate\Http\Request;

class ControladorOrcamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orcamentos = Orcamento::latest()->paginate(5);

        return view('orcamentos.index', compact('orcamentos'))
            ->with('i', (request()->input('página', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orcamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente' =>'required',
            'vendedor' => 'required',
            'valor' => 'required',
        ]);
        Orcamento::create($request->all());

        return redirect()->route('orcamentos.index')
                        ->with('sucesso', 'Orcamento cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function show(Orcamento $orcamento)
    {
        return view('orcamentos.show', compact('orcamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Orcamento $orcamento)
    {
        return view('orcamentos.edit', compact('orcamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orcamento $orcamento)
    {
        $request->validate([
            'cliente' =>'required',
            'vendedor' => 'required',
            'valor' => 'required',
        ]);
        $orcamento->update($request->all());
        
        return redirect()->route('orcamentos.index')
                        ->with('sucesso', 'Orçamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orcamento $orcamento)
    {
        $orcamento->delete();

        return redirect()->route('orcamentos.index')
                        ->with('sucesso', 'Orçamento excluido com sucesso.');
    }
}
