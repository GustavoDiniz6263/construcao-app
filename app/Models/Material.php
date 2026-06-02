<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiais';
    protected $fillable = ['fabricante', 'unidade_de_medida', 'cor', 'textura', 'material_de_fabricacao','peso','data_de_validade','quantidade_em_estoque', 'categorias_id', 'image'];
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
    //
}
