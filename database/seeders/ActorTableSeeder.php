<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Application\Models\Actor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ActorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Actor::factory()->count(15)->create();
    }
}
