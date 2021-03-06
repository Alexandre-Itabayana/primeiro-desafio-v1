<?php

namespace App\Http\Controllers;

use App\Orcamento;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ControladorOrcamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orcamentos = Orcamento::sortable()->paginate(5);


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
    public function show()
    {
        return view('orcamentos.show');
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

    public function search(Request $request){
        $search_cliente = $request->get('search_cliente');
        $search_vendedor = $request->get('search_vendedor');
        $dataInicio =$request->input('data_inicio');
        $dataFim = $request->input('data_fim');
        $agora = Carbon::now();
        if($dataInicio > $agora or $dataFim >$agora){
              return back()->withErrors(['Data não pode ser maiorque data atual', 'msg']);
        }else{
            if($dataInicio == NULL and  $dataFim == NULL){
                $orcamentos = Orcamento::sortable()
                ->where('cliente', 'like', '%'.$search_cliente.'%')->orderBy('created_at')
                ->where('vendedor', 'like', '%'.$search_vendedor.'%')->orderBy('created_at')
                ->paginate(5);
                return view('orcamentos.index', compact('orcamentos'))
                    ->with('i', (request()->input('página', 1)-1)*5);  
            }else{
                if($dataFim != NULL and $dataInicio != null and $dataFim < $dataInicio){
                    return back()->withErrors(['Data final não pode ser maior que a inicial', 'msg']);
                }else{
                    if($dataFim != NULL and $dataInicio != null){
                    $orcamentos = Orcamento::sortable()
                    ->where('cliente', 'like', '%'.$search_cliente.'%')->orderBy('created_at')
                    ->where('vendedor', 'like', '%'.$search_vendedor.'%')->orderBy('created_at')
                    ->WhereDate('created_at', '>=', $dataInicio)->orderBy('created_at')
                    ->WhereDate('created_at', '<=', $dataFim)->orderBy('created_at')
                    ->paginate(5);
                    return view('orcamentos.index', compact('orcamentos'))
                        ->with('i', (request()->input('página', 1)-1)*5);
                    }else
                        return back()->withErrors(['Os dois intervalos de data devem ser preenchidos', 'msg']);

                }
            }


            
            }
            
        }    

    }

  
