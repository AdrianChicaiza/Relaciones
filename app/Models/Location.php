<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    
    //ASIGNACIÓN MASIVA.- para realizar inserciones sin que se generen conflictos en la base de datos.
    protected $guarded = [];


    // RELACIÓN DE UNO A UNO
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    
    
}
