<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Image;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //creación de 5 usuarios
        User::factory()->count(5)->create();

        //obtener todos los usuarios registrados
        $users = User::all();

        //iterar por cada usuario registrado
        $users->each(function ($user)
        {
            //asociar un perfil con a un usuario
            $user->profile()->save(Profile::factory()->make());
        });

        //obtener los datos de perfil recolectados en el paso anterior
        $profiles = Profile::all();

        //iterar por cada perfil registrado
        $profiles->each(function ($profile)
        {
            //asociar una ubicación a cada perfil de usuario
            $profile->location()->save(Location::factory()->make());
        });

        //iterar por cada usuario registrado
        $users->each(function ($user)
        {
            //asociar una imagen con un usuario
            $user->image()->save(Image::factory()->make(['url' => "https://picsum.photos/id/$user->id/100/100"]));
        });

        //iterar por cada usuario registrado
        $users->each(function ($user)
        {

            //generar numeros randomicos del 1 al 3
            $group = rand(1, 3);

            //iterar el número randomico que se va a generar
            //en este caso 1, 2 o 3
            for ($i = 1; $i <= $group; $i++) {
                
                //asociar al usuario con uno de los grupos creados
                $user->groups()->attach($i);
            }
        });


    }
}
