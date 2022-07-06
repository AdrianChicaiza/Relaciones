<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    // RELACIÓN DE UNO A MUCHOS - C
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    // RELACIÓN DE UNO A MUCHOS
    public function videos()
    {
        return $this->hasMany(Video::class);
    }


}
