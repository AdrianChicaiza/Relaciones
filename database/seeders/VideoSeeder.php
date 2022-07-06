<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\Image;
use App\Models\Comment;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::factory()->count(10)->create();
        $posts = Video::all();

       $posts->each(function ($post)
       {
           $post->image()->save(Image::factory()->make(['url' => "https://picsum.photos/id/$post->id/150/150"]));
       });

       $posts->each(function ($post)
       {

        $tags = rand(1,5);
        for($i=1 ; $i<=$tags ; $i++)
        {
            $post->tags()->attach($i);
        }
       });

       $posts->each(function ($post)
       {

           $number_comments = rand(1,2);

           for($i=0 ; $i<$number_comments ; $i++)
           {
               $post -> comments()->save(Comment::factory()->make());
           }

       });




    }
}
