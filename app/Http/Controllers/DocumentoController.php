<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Documento;
use App\Models\Licitacion;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Documento::all();

        return view('documento.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // Document and relations
        $doc = Documento::find($id);
        $doc_lici = Licitacion::find($doc->licitacion_id);
        $doc_area = Area::find($doc->area_id);

        // All areas
        $areas = Area::all();

        return view('documento.edit', compact('doc', 'doc_lici', 'doc_area', 'areas'));
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
            'nombre_documentos' => 'required',
            'URL_documentos' => 'required',
            'fecha_entrega' => 'required',
            'usuario_entrega' => 'required',
            'area_id' => 'required'
        ]);

        // Update
        Documento::find($id)->update($request->all());

        // Current licitacion
        $doc = Documento::find($id);

        return redirect()->route('licitaciones.show', $doc->licitacion_id)->with('success', 'Documento actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
