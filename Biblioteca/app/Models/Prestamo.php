<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $fillable=['Poseedor','Fecha_Prestamo','Fecha_Devolucion','libro_id'];
    public function libro(){
        return $this->belongsTo(Libro::class);
    }
}
