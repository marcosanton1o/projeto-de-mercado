<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    public function posto()
    {
        return $this->belongsTo(Posto::class, 'posto_id_posto');
    }
    public function corridas()
    {
        return $this->hasMany(Corrida::class, 'corrida_user', 'id');
    }
    public function sugestoes()
    {
        return $this->hasMany(Sugestao::class, 'sugestao_id_user');
    }
    public function avisos()
    {
        return $this->hasMany(Aviso::class, 'user_id');
    }

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'numero_tel',
        'cpf',
        'placa_carro',
        'cargo',
        'data_nascimento',
        'password',
        'posto_id_posto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
