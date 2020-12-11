<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = array(
        'nombre_documentos',
        'URL_documentos',
        'fecha_entrega',
        'usuario_entrega',
        'licitacion_id',
        'area_id'
    );

    public function licitacion()
    {
        return $this->belongsTo('App\Models\Licitacion');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
}
