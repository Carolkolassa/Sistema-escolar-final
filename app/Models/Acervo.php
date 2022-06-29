<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acervo extends Model
{
    use HasFactory;
    protected $table = "acervos";
    protected $fillable = ['nome', 'descricao'];

}
