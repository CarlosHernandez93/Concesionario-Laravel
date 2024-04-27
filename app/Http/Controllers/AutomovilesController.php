<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutomovilesFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Automoviles;

class AutomovilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request) {
            $query = trim($request->get('text'));
            $automoviles = DB::table('automoviles')
                ->where('Marca', 'LIKE', '%' . $query . '%')
                ->where('estado', '=', '1')
                ->orderBy('id_automovil', 'desc')
                ->paginate(7);
            return view('deposito.automoviles.index', ['Automoviles' => $automoviles, 'text' => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
