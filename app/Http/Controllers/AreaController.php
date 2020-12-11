<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $documentos = Area::with('documentos')->get();
        // error_log($documentos);

        $data = Area::all();

        return view('area.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.create');
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
            'nombre_area' => 'required'
        ]);

        Area::create($request->all());

        return redirect()->route('areas.index')->with('success', 'Área creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Area::find($id);

        return view('area.edit')->withData($data);
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
            'nombre_area' => 'required'
        ]);

        Area::find($id)->update($request->all());

        return redirect()->route('areas.index')->with('success', 'Nombre del área actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Verify if Area exist or don't
        $area = Area::find($id);

        if (!$area) {
            return redirect()->route('areas.index')->with('danger', 'El Área seleccionada no existe.');
        }

        // Get all docs in the area
        $docs_on_area = $area->documentos()->get();

        // Verify if it has any
        if (sizeof($docs_on_area) > 0) {
            return redirect()->route('areas.index')->with('warning', 'El Area contiene documentos, no puede ser eliminada.');
        }

        // Proceed to delete the Area
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'El Área fue eliminada exitosamente.');
    }
}
