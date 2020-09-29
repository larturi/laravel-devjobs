<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Ubicacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'imagen', 'descripcion', 'skills', 'categoria_id', 'experiencia_id', 'ubicacion_id', 'salario_id'
    ];

    // Relacion 1:1 Vacante:Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

     // Relacion 1:1 Vacante:Salario
     public function salario()
     {
         return $this->belongsTo(Salario::class);
     }

     // Relacion 1:1 Vacante:Ubicacion
     public function ubicacion()
     {
         return $this->belongsTo(Ubicacion::class);
     }

     // Relacion 1:1 Vacante:Experiencia
     public function experiencia()
     {
         return $this->belongsTo(Experiencia::class);
     }

     // Relacion 1:1 Vacante:REclutador
     public function reclutador()
     {
         return $this->belongsTo(User::class, 'user_id');
     }


}
