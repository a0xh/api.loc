<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleTableSeeder::class,
            UserTableSeeder::class,
            GenreTableSeeder::class,
            ActorTableSeeder::class,
            FilmTableSeeder::class,
        ]);
    }
}
