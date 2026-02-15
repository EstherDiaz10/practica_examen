<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desarrollador extends Model
{
    protected $table = 'desarrolladores';

    protected $fillable = ['nombre', 'especialidad'];

    public function proyectos() {

        return $this->belongsToMany(Proyecto::class);
    }
}
