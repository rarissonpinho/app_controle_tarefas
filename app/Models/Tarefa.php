<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    protected $fillable = ['tarefas', 'data_limite_conclusao', 'user_id'];

    public function user() {
        //belongsTo (pertence a)
        return $this->belongsTo('App\Models\User');
    }
}
