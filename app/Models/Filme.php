<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;
    protected $table = "filmes";
    protected $fillable = ['nome', 'categoria'];

public function atores() {
    return $this->hasMany("App\Models\FilmeAtor");
}

}
