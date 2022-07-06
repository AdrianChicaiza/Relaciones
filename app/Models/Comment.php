<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];



    use HasFactory;
    // RELACIÓN DE UNO A MUCHOS
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // RELACIÓN DE UNO A MUCHOS POLIMÓRIFCA
    public function commentable()
    {

        return $this->morphTo();
    }





}
