<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // RELACIÓN DE UNO A UNO
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


        // RELACIÓN DE UNO A MUCHOS
        public function level()
        {
            return $this->belongsTo(Level::class);
        }




    // RELACIÓN DE UNO A MUCHOS - U
    public function videos()
    {
        return $this->hasMany(Video::class);
    }



    // RELACIÓN DE UNO A MUCHOS
    public function posts()
    {
        return $this->hasMany(Post::class);
    }





    // RELACIÓN DE MUCHOS A MUCHOS
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }



    // RELACIÓN POLIMÓRFICA DE UNO A UNO
    public function image()
    {
        return $this->MorphOne(Image::class, 'imageable');
    }



    // RELACIÓN DE UNO A MUCHOS
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


        // CONSULTA  A TRAVÉS DE
        public function location()
        {
            return $this->hasOneThrough(Location::class, Profile::class);
        }
    
    

}
