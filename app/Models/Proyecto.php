<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = ['nombre', 'descripcion'];

    public function desarrolladores() {

        return $this->belongsToMany(Desarrollador::class);
    }
}
