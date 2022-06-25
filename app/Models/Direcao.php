<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcao extends Model
{
    use HasFactory;
    protected $table = "direcaos";
    protected $fillable = ['nome', 'cargo'];

}
