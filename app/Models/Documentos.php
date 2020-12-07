<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table = 'documentos';

    protected $fillable = array(
        'nombre_documentos',
        'URL_documentos',
        'fecha_entrega',
        'usuario_entrega',
        'id_cliente',
        'id_area'
    );
}
