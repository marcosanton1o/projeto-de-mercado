<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Posto extends Authenticatable
{
    use HasFactory,  Notifiable;

    public function posto()

    {
        return $this->hasMany(User::class);
    }
    public function users()
    {
        return $this->hasMany(User::class, 'posto_id_posto');
    }
    protected $fillable = [
        'id_posto',
        'local_cidade',
        'numero_tel_posto',
        'local_estado',
        'cep',
    ];
}

