<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licitacion;

class LicitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Licitacion::all();

        return view('licitacion.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('licitacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'id_cliente' => 'required',
            'fecha_inicio' => 'required',
            'fecha_cierre' => 'required',
            'fecha_presentacion_documentos' => 'required'
        ]);

        Licitacion::create($request->all());

        return redirect()->route('licitaciones.index')->with('success', 'Licitación creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lici = Licitacion::find($id);
        $docs = $lici->documentos()->get();

        return view('licitacion.details', compact('lici', 'docs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $licitacion = Licitacion::find($id);

        return view('licitacion.edit', compact('licitacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'id_cliente' => 'required',
            'fecha_inicio' => 'required',
            'fecha_cierre' => 'required',
            'fecha_presentacion_documentos' => 'required'
        ]);

        Licitacion::find($id)->update($request->all());

        return redirect()->route('licitaciones.show', $id)->with('success', 'Licitación actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Verify if exist or don't
        $lici = Licitacion::find($id);

        if (!$lici) {
            return redirect()->route('licitaciones.index')->with('danger', 'La licitación seleccionada no existe.');
        }

        // Get all docs inside it
        $docs_on_lici = $lici->documentos()->get();

        // Verify if it has any
        if (sizeof($docs_on_lici) > 0) {
            return redirect()->route('licitaciones.show', $id)->with('warning', 'La licitación contiene documentos, no puede ser eliminada.');
        }

        // Proceed to delete
        $lici->delete();

        return redirect()->route('licitaciones.index')->with('success', 'La licitación fue eliminada exitosamente.');
    }
}
