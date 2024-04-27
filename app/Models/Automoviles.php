<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automoviles extends Model
{
    use HasFactory;
    protected $table = 'automoviles';
    protected $primaryKey = 'id_automovil';
    public $timestamps = false;
    protected $fillable = ['Marca', 'Referencia','Descripcion', 'estado'];
    protected $guarded = [];

}
