<?php
// app/Models/Time.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = ['nome_time', 'integrantes'];

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
}