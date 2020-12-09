<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licitacion extends Model
{
    protected $table = 'licitaciones';

    protected $fillable = array(
        'nombre',
        'id_cliente',
        'fecha_inicio',
        'fecha_cierre',
        'fecha_presentacion_documentos'
    );
}
