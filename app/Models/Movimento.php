<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = 'movimento';

    protected $fillable = ['nome'];

    public function recordsPessoais()
    {
        return $this->hasMany(RecordPessoal::class, 'movimento_id');
    }
}
