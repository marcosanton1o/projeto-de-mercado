<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Corrida extends Model
{
    use HasFactory,  Notifiable;

    protected $table = 'registro_corrida';
    protected $primaryKey = 'id_registro_corrida';

    protected $fillable = [
        'id_registro_corrida',
        'data',
        'preco',
        'nome_cliente',
        'corrida_user',
    ];
}
