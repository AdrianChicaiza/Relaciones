<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    // RELACIÓN DE MUCHOS A MUCHOS
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }


    
}
