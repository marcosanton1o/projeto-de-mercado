<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sugestao extends Model
{
    use HasFactory;

    protected $table = 'sugestao';

    protected $fillable = [
        'id_sugestao',
        'titulo',
        'descricao',
        'sugestao_id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'sugestao_id_user');
    }

}
