<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiltroAutomovilFormRequest;
use Illuminate\Http\Request;

//Se inserta el modelo FiltroAutomovil
use App\Models\FiltroAutomovil;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class FiltroAutomovilController extends Controller
{
    
    public function index(Request $request)
    {
            $texto = trim($request->get('texto'));
            $filtros = DB::table('FiltroAutomovil as f')
                ->join('automoviles as a','f.id_FiltroAutomovil','=','a.id_automovil')
                ->select('f.id_FiltroAutomovil','f.marca_FiltroAutomovil','f.referencia_FiltroAutomovil','f.existencia_FiltroAutomovil','a.marca as automovil', 'f.descripcion_FiltroAutomovil','f.imagen_FiltroAutomovil','f.estado_FiltroAutomovil')
                ->where('f.marca_FiltroAutomovil','LIKE','%',$texto.'%')
                ->orwhere('f.referencia_FiltroAutomovil','LIKE','%'.$texto,'%')
                ->orderby('f.FiltroAutomovil','desc')
                ->paginate(10);

                return view('deposito.FiltroAutomovil.index', compact('filtros','texto'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deposito.automoviles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutomovilesFormRequest $request)
    {
        //
        $automovil = new Automoviles();
        $automovil->Marca = $request->get('Marca');
        $automovil->Descripcion = $request->get('Descripcion');
        $automovil->Referencia = $request->get('Referencia');     
        $automovil->estado = '1';  
        $automovil->save();

        return redirect('deposito/Automoviles');

    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    //     return view('deposito.automoviles.show', ['Automoviles' => Automoviles::findOrFail($id)]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('deposito.automoviles.edit', ['Automoviles' => Automoviles::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $automovil = Automoviles::findOrFail($id);
        $automovil->Marca = $request->get('Marca');
        $automovil->Referencia = $request->get('Referencia');
        $automovil->Descripcion = $request->get('Descripcion');
        $automovil->update();

        return redirect('deposito/Automoviles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $automovil = Automoviles::findOrFail($id);
        $automovil->estado = '0';
        $automovil->update();
    
        return redirect()->route('Automoviles.index')->with('success', 'Automovil eliminado');
    }
}