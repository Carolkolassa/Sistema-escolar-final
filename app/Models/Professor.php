<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $table = "professors";
    protected $fillable = ['nome', 'nacionalidade_id', 'dt_nascimento', 'inicio_atividades'];

    public function nacionalidade() {
        return $this->belongsTo("App\Models\Nacionalidade");
    }
}
