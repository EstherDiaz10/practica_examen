<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Etiqueta;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = ['titulo', 'descripcion', 'user_id'];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function etiquetas() {

        return $this->belongsToMany(Etiqueta::class);
    }
}
