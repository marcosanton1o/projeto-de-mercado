<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    use HasFactory;
    protected $table = 'avisos';
    protected $primaryKey = 'id_aviso';

    protected $fillable = [
        'titulo',
        'conteudo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

