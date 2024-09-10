<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Adicione aqui os campos que você deseja permitir para atribuição em massa
    protected $fillable = [
        'title',
        'description',
        'completed',
    ];

    // Se você estiver usando o campo `timestamps` e quiser desativá-lo, adicione isso:
    public $timestamps = true; // ou false, se você não estiver usando timestamps
}
