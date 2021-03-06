<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'inicio',
        'situacao',
        'fim',
        'link',
        'sala_id'
    ];
}
