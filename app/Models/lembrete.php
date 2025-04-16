<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Lembrete extends Model
{
    use HasFactory;

    protected $table = 'lembrete';

    protected $primaryKey = 'id_lembrete';

    public $timestamps = true;

    protected $fillable = [
        'cliente',
        'estado',
        'cidade',
        'distância',
        'preco',
        'horario',
        'data',
        'user_lembrete',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_lembrete');
    }
}
