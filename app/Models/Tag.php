<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
        
    // RELACIÓN DE MUCHOS A MUCHOS POLIMÓRIFCA
    public function videos()
    {
        return $this->morphedByMany(Video::class,'taggable');
    }
    
    // RELACIÓN DE MUCHOS A MUCHOS POLIMÓRIFCA
    public function posts()
    {
        return $this->morphedByMany(Post::class,'taggable');
    }
    
    
}
