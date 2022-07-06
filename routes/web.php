<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
    $users = User::all();
    //dd($users);
    return view('welcome',compact('users'));
})->name('home');


Route::get('profile/{id}',function($id)
{
    // dd($user);
    $user = User::find($id);

    // dd($user);
    $posts = $user->posts()
    // apartir de la relacion realiza una consulta de los videos (with)
    //contando modelos relaciones (withcount) -- cuanta cuantos comentarios tiene el post
    //(get) con get traes datos especificos con (all) traes todos los datos
                  ->with('category','image','tags')
                  ->withCount('comments')
                  ->get();
    //muestra en la pantalla un json con los datos solicitados (dd)
    //dd($posts);
    $videos = $user->videos()
            
            ->with('category','image','tags')
            ->withCount('comments')
            ->get();
    //por ultimo retorno en la vista pasando el ususario, post y el video. 
    return view('profile',compact(['user','posts','videos']));

})->name('profile');

