<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
        $artists = factory(App\Artist::class, 5)->create();
        $artists->each(function ($artist) {
            $artist->albums()->saveMany(
                factory(App\Album::class, 2)->make()
            );
         })->each(function ($artist) {
            $artist->albums()->each(function ($album) {
                $album->songs()->saveMany(
                    factory(App\Song::class, 10)->make()
                );
             });
         });
    }
}
