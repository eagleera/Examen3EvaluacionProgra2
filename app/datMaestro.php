<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datMaestro extends Model
{
    protected $primaryKey = 'idMaestro';

    public function gradoAcademico()
    {
        return $this->belongsTo('App\catGradoAcademico', 'idGradoAca');
    }    
}
