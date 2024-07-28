<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Application\Models\{Film, Genre, Actor, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre = collect(Genre::get('id')->all())->random()->toArray();
        $user = collect(User::get('id')->all())->random()->toArray();
        $actor = collect(Actor::get('id')->all())->random()->toArray();

        Film::factory()->count(30)->create([
            'genre_id' => $genre['id'],
            'user_id' => $user['id']
        ]);

        Film::all()->each(function ($film) use ($actor) { 
            $film->actors()->sync([$actor['id']]); 
        });
    }
}
