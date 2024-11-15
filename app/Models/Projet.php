<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function worker(){
        return $this->belongsTo(User::class);
    }
}
