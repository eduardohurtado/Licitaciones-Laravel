<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licitaciones extends Model
{
    protected $table = 'fabricantes';

    protected $fillable = array(
        'nombre',
        'id_cliente',
        'fecha_inicio',
        'fecha_cierre',
        'fecha_presentacion_documentos'
    );
}
