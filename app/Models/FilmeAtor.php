<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmeAtor extends Model
{
    use HasFactory;
    protected $table = "filme_atores";
    protected $fillable = ['filme_id', 'ator_id'];

public function ator() {
    return $this->belongsTo("App\Models\Ator");
}

}
