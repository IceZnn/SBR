<?php
// app/Models/Time.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    // ADICIONE 'nome_imagem' NO FILLABLE
    protected $fillable = ['nome_time', 'integrantes', 'nome_imagem'];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'integrantes' => 'array',
    ];

    /**
     * Acessor para contar o número de integrantes
     */
    public function getNumeroIntegrantesAttribute()
    {
        return count($this->integrantes ?? []);
    }

    /**
     * Acessor para obter o caminho completo da imagem
     */
    public function getImagemCompletaAttribute()
    {
        if ($this->nome_imagem) {
            return asset('storage/times/' . $this->nome_imagem);
        }
        return asset('storage/times/default.png');
    }
}