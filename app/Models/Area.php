<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $fillable = array('nombre_area');

    public function documentos()
    {
        return $this->hasMany('Documento');
    }
}
