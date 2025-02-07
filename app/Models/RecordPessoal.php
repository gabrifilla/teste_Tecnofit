<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordPessoal extends Model
{
    protected $table = 'record_pessoal';

    protected $fillable = ['usu_id', 'movimento_id', 'valor', 'data'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usu_id');
    }

    public function movimento()
    {
        return $this->belongsTo(Movimento::class, 'movimento_id');
    }
}
