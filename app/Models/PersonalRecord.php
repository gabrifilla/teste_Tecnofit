<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    protected $table = 'personal_records';

    protected $fillable = ['usu_id', 'move_id', 'value', 'date'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usu_id');
    }

    public function movimento()
    {
        return $this->belongsTo(Movement::class, 'move_id');
    }
}
