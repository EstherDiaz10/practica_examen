<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    protected $table = 'etiquetas';

    protected $fillable = ['nombre'];

    public function cursos() {

        return $this->belongsToMany(Curso::class);
    }
}
