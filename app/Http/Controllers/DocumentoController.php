<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Documento;
use App\Models\Licitacion;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

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

    public function createDocument($id)
    {
        // Current Licitacion
        $lici = Licitacion::find($id);

        // All areas
        $areas = Area::all();

        return view('documento.create', compact('lici', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
    }

    public function storeDocument(Request $request, $id)
    {
        $this->validate($request, [
            'licitacion_id' => 'required',
            'nombre_documentos' => 'required',
            'file' => 'required|mimes:csv,pptx,txt,xlx,xls,xlsx,pdf,doc,docx',
            'fecha_entrega' => 'required',
            'usuario_entrega' => 'required',
            'area_id' => 'required'
        ]);

        // Get environment local storage folder path
        $documents_storage_path = Config::get('values.documents_storage_path');

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = URL::to('/' . $documents_storage_path . $fileName);

            // Storage new file
            $request->file->move(public_path($documents_storage_path), $fileName);
        }

        // Create an array to save a new Documento
        $newDocument = array(
            'licitacion_id' => $request->licitacion_id,
            'nombre_documentos' => $request->nombre_documentos,
            'URL_documentos' => $filePath,
            'fecha_entrega' => $request->fecha_entrega,
            'usuario_entrega' => $request->usuario_entrega,
            'area_id' => $request->area_id
        );

        // Create new Document
        Documento::create($newDocument);

        return redirect()->route('licitaciones.show', $id)->with('success', 'Documento añadido satisfactoriamente');
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

        // Update document
        Documento::find($id)->update($request->all());

        // Current document
        $doc = Documento::find($id);

        return redirect()->route('licitaciones.show', $doc->licitacion_id)->with('success', 'Documento actualizado satisfactoriamente');
    }

    public function download($id)
    {
        // Get the document
        $doc = Documento::find($id);

        // Get old filename route
        $old_file_name_route = Str::after(parse_url($doc->URL_documentos, PHP_URL_PATH), '/');

        // Get file extension
        $extension = Str::after($old_file_name_route, '.');

        // Make new filename
        $new_file_name = $doc->nombre_documentos . '.' . $extension;

        // Rename filename before download
        return response()->download(public_path($old_file_name_route), $new_file_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Current document
        $doc = Documento::find($id);
        $url = $doc->URL_documentos;

        // Get environment local storage folder path
        $documents_storage_path = Config::get('values.documents_storage_path');

        // Get the filename
        $get_filename = preg_split("/\//", $url);
        $filename_path = $documents_storage_path . array_pop($get_filename);

        // Delete the file associated to the current Document
        File::delete($filename_path);

        // Delete document
        Documento::find($id)->delete();

        return redirect()->route('licitaciones.show', $doc->licitacion_id)->with('success', 'Documento eliminado satisfactoriamente');
    }
}
